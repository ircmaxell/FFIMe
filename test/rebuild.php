<?php
require __DIR__ . '/../vendor/autoload.php';

const EXPECTATIONS = [
    'EXPECT',
    'EXPECTF',
    'EXPECTREGEX',
];

const EXTERNAL_SECTIONS = [
    'FILE',
    'EXPECT',
    'EXPECTF',
    'EXPECTREGEX',
];

const REQUIRED_SECTIONS = [
    'FILE',
    EXPECTATIONS,
];

const UNSUPPORTED_SECTIONS = [
    'REDIRECTTEST',
    'REQUEST',
    'POST',
    'PUT',
    'POST_RAW',
    'GZIP_POST',
    'DEFLATE_POST',
    'GET',
    'COOKIE',
    'HEADERS',
    'CGI',
    'EXPECTHEADERS',
    'EXTENSIONS',
    'PHPDBG',
];





foreach (provideTestsFromDir(__DIR__ . '/cases/') as $test) {
    $path = str_replace(__DIR__ . '/cases/', '', $test[0]);
    $targetName = 'FFIMe\\Test\\' . str_replace(['/', '.phpt'], ['\\', ''], $path) . 'Test';
    $targetFile = __DIR__ . '/generated/' . str_replace('.phpt', 'Test', $path);

    $targetDir = dirname($targetFile);
    @mkdir($targetDir, 0777, true);

    $namespace = explode('\\', $targetName);
    $class = array_pop($namespace);
    compileTest($targetFile, implode('\\', $namespace), $class, $test, true);
}


function compileTest(string $targetFile, string $namespace, string $class, array $test, bool $isDump): void {
    file_put_contents($targetFile . '.h', $test[2]);
    $parts = explode('/', $targetFile);
    $relativeTarget = array_pop($parts);

    $targetParts = ltrim(str_replace(__DIR__ .  '/', '', $targetFile), '/');
    $searchParts = explode('/', $targetParts);
    array_pop($searchParts);
    $searchPath = '/';
    foreach ($searchParts as $relative) {
        $searchPath .= '../';
    }
    $searchPath .= 'include';

    $expected = '';
    $assert = '';

    $resultFile = var_export('/' . $relativeTarget . '.result.php', true);

    if (isset($test[3]['EXPECT'])) {
        $expected = trim($test[3]['EXPECT']);
        $assert = '$this->assertStringContainsString(self::EXPECTED, trim(file_get_contents(__DIR__ . ' . $resultFile . ')));';
    } elseif (isset($test[3]['EXPECTF'])) {
        $expected = trim($test[3]['EXPECTF']);
        $assert = '$this->assertStringMatchesFormat(self::EXPECTED, trim(file_get_contents(__DIR__ . ' . $resultFile . ')));';
    } else {
        throw new \LogicException("Unknown test expectation type");
    }


    $return = '<?php declare(strict_types=1);
namespace ' . $namespace . ';
use FFIMe\FFIMe;
use PHPUnit\Framework\TestCase;

/**
 * Note: this is a generated file, do not edit this!!!
 */
class ' . $class . ' extends TestCase {

    const EXPECTED = ' . var_export($expected, true) . ';

    protected FFIMe $lib;
    protected Printer $printer;

    public function setUp(): void {
        $this->lib = new class(
            PHP_OS_FAMILY === "Darwin" ? "/usr/lib/libSystem.B.dylib" : "/lib/x86_64-linux-gnu/libc.so.6",
            [
                __DIR__,
                __DIR__ . ' . var_export($searchPath, true) . '
            ]
        ) extends FFIMe {
            // Bypass filtering for tests
            protected function filterSymbolDeclarations(): void {}
        };
    }

    public function tearDown(): void {
        @unlink(__DIR__ . ' . $resultFile . ');
    }

    /**
     * @textdox ' . $test[1] . '
     */
    public function testCodeGen() {
        $this->lib->include(__DIR__ . ' . var_export('/' . $relativeTarget . '.h', true) . ');
        $this->lib->codeGen("test\\\\test", __DIR__ . ' . $resultFile . ');
        $this->assertFileExists(__DIR__ . ' . $resultFile . ');
        ' . $assert . '
    }
}';
    file_put_contents($targetFile . '.php', $return);

}





function provideTestsFromDir(string $dir): \Generator {
    foreach (new \DirectoryIterator($dir) as $path) {
        if (!$path->isDir() || $path->isDot()) {
            continue;
        }
        yield from provideTestsFromDir($path->getPathname());
    }
    foreach (new \GlobIterator($dir . '/*.phpt') as $test) {
        yield parseTest(realpath($test->getPathname()));
    }
}

function parseTest(string $filename): array {
    $sections = [];
    $section = '';
    foreach (file($filename) as $line) {
        if (preg_match('(^--([_A-Z]+)--)', $line, $result)) {
            $section = $result[1];
            $sections[$section] = '';
            continue;
        }
        if (empty($section)) {
            throw new \LogicException("Invalid PHPT file: empty section header");
        }
        $sections[$section] .= $line;
    }
    if (!isset($sections['TEST'])) {
        throw new \LogicException("Every test must have a name");
    }
    if (isset($sections['FILEEOF'])) {
        $sections['FILE'] = rtrim($sections['FILEEOF'], "\r\n");
        unset($sections['FILEEOF']);
    }
    parseExternal($sections, dirname($filename));
    if (!validate($sections)) {
        throw new \LogicException("Invalid PHPT File");
    }
    foreach (UNSUPPORTED_SECTIONS as $section) {
        if (isset($sections[$section])) {
            throw new \LogicException("PHPT $section sections are not supported");
        }
    }
    return [
        $filename,
        trim($sections["TEST"]),
        $sections['FILE'],
        $sections,
    ];
}

function parseExternal(array &$sections, string $testdir): void {
    foreach (EXTERNAL_SECTIONS as $section) {
        if (isset($sections[$section . '_EXTERNAL'])) {
            $filename = trim($sections[$section . '_EXTERNAL']);
            if (!is_file($testdir . '/' . $filename)) {
                throw new \RuntimeException("Could not load external file $filename");
            }
            $sections[$section] = file_get_contents($testdir . '/' . $filename);
        }
    }
}

function validate(array &$sections): bool {
    foreach (REQUIRED_SECTIONS as $section) {
        if (is_array($section)) {
            foreach ($section as $any) {
                if (isset($sections[$any])) {
                    continue 2;
                }
            }
            return false;
        } elseif (!isset($sections[$section])) {
            return false;
        }
    }
    return true;
}
