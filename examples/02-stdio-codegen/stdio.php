<?php namespace stdio;
use FFI;
use stdio\double;
interface istdio {}
interface istdio_ptr {}
/**
 * @property struct___sFILE_ptr $__stdinp
 * @property struct___sFILE_ptr $__stdoutp
 * @property struct___sFILE_ptr $__stderrp
 * @property int $sys_nerr
 */
class stdio {
    const __x86_64__ = 1;
    const __LP64__ = 1;
    const __GNUC_VA_LIST = 1;
    const __GNUC__ = 4;
    const __GNUC_MINOR__ = 2;
    const __STDC__ = 1;
    const __DARWIN_ONLY_64_BIT_INO_T = 0;
    const __DARWIN_ONLY_UNIX_CONFORMANCE = 1;
    const __DARWIN_ONLY_VERS_1050 = 0;
    const __DARWIN_UNIX03 = 1;
    const __DARWIN_64_BIT_INO_T = 1;
    const __DARWIN_VERS_1050 = 1;
    const __DARWIN_NON_CANCELABLE = 0;
    const __DARWIN_C_ANSI = 010000;
    const __DARWIN_C_FULL = 900000;
    const __STDC_WANT_LIB_EXT1__ = 1;
    const __DARWIN_NO_LONG_LONG = 0;
    const _DARWIN_FEATURE_64_BIT_INODE = 1;
    const _DARWIN_FEATURE_ONLY_UNIX_CONFORMANCE = 1;
    const _DARWIN_FEATURE_UNIX_CONFORMANCE = 3;
    const __has_ptrcheck = 0;
    const __API_TO_BE_DEPRECATED = 100000;
    const __API_TO_BE_DEPRECATED_MACOS = 100000;
    const __API_TO_BE_DEPRECATED_IOS = 100000;
    const __API_TO_BE_DEPRECATED_TVOS = 100000;
    const __API_TO_BE_DEPRECATED_WATCHOS = 100000;
    const __API_TO_BE_DEPRECATED_MACCATALYST = 100000;
    const __API_TO_BE_DEPRECATED_DRIVERKIT = 100000;
    const __MAC_10_0 = 1000;
    const __MAC_10_1 = 1010;
    const __MAC_10_2 = 1020;
    const __MAC_10_3 = 1030;
    const __MAC_10_4 = 1040;
    const __MAC_10_5 = 1050;
    const __MAC_10_6 = 1060;
    const __MAC_10_7 = 1070;
    const __MAC_10_8 = 1080;
    const __MAC_10_9 = 1090;
    const __MAC_10_10 = 101000;
    const __MAC_10_10_2 = 101002;
    const __MAC_10_10_3 = 101003;
    const __MAC_10_11 = 101100;
    const __MAC_10_11_2 = 101102;
    const __MAC_10_11_3 = 101103;
    const __MAC_10_11_4 = 101104;
    const __MAC_10_12 = 101200;
    const __MAC_10_12_1 = 101201;
    const __MAC_10_12_2 = 101202;
    const __MAC_10_12_4 = 101204;
    const __MAC_10_13 = 101300;
    const __MAC_10_13_1 = 101301;
    const __MAC_10_13_2 = 101302;
    const __MAC_10_13_4 = 101304;
    const __MAC_10_14 = 101400;
    const __MAC_10_14_1 = 101401;
    const __MAC_10_14_4 = 101404;
    const __MAC_10_14_6 = 101406;
    const __MAC_10_15 = 101500;
    const __MAC_10_15_1 = 101501;
    const __MAC_10_15_4 = 101504;
    const __MAC_10_16 = 101600;
    const __MAC_11_0 = 110000;
    const __MAC_11_1 = 110100;
    const __MAC_11_3 = 110300;
    const __MAC_11_4 = 110400;
    const __MAC_11_5 = 110500;
    const __MAC_11_6 = 110600;
    const __MAC_12_0 = 120000;
    const __MAC_12_1 = 120100;
    const __MAC_12_2 = 120200;
    const __MAC_12_3 = 120300;
    const __MAC_13_0 = 130000;
    const __MAC_13_1 = 130100;
    const __MAC_13_2 = 130200;
    const __MAC_13_3 = 130300;
    const __IPHONE_2_0 = 20000;
    const __IPHONE_2_1 = 20100;
    const __IPHONE_2_2 = 20200;
    const __IPHONE_3_0 = 30000;
    const __IPHONE_3_1 = 30100;
    const __IPHONE_3_2 = 30200;
    const __IPHONE_4_0 = 40000;
    const __IPHONE_4_1 = 40100;
    const __IPHONE_4_2 = 40200;
    const __IPHONE_4_3 = 40300;
    const __IPHONE_5_0 = 50000;
    const __IPHONE_5_1 = 50100;
    const __IPHONE_6_0 = 60000;
    const __IPHONE_6_1 = 60100;
    const __IPHONE_7_0 = 70000;
    const __IPHONE_7_1 = 70100;
    const __IPHONE_8_0 = 80000;
    const __IPHONE_8_1 = 80100;
    const __IPHONE_8_2 = 80200;
    const __IPHONE_8_3 = 80300;
    const __IPHONE_8_4 = 80400;
    const __IPHONE_9_0 = 90000;
    const __IPHONE_9_1 = 90100;
    const __IPHONE_9_2 = 90200;
    const __IPHONE_9_3 = 90300;
    const __IPHONE_10_0 = 100000;
    const __IPHONE_10_1 = 100100;
    const __IPHONE_10_2 = 100200;
    const __IPHONE_10_3 = 100300;
    const __IPHONE_11_0 = 110000;
    const __IPHONE_11_1 = 110100;
    const __IPHONE_11_2 = 110200;
    const __IPHONE_11_3 = 110300;
    const __IPHONE_11_4 = 110400;
    const __IPHONE_12_0 = 120000;
    const __IPHONE_12_1 = 120100;
    const __IPHONE_12_2 = 120200;
    const __IPHONE_12_3 = 120300;
    const __IPHONE_12_4 = 120400;
    const __IPHONE_13_0 = 130000;
    const __IPHONE_13_1 = 130100;
    const __IPHONE_13_2 = 130200;
    const __IPHONE_13_3 = 130300;
    const __IPHONE_13_4 = 130400;
    const __IPHONE_13_5 = 130500;
    const __IPHONE_13_6 = 130600;
    const __IPHONE_13_7 = 130700;
    const __IPHONE_14_0 = 140000;
    const __IPHONE_14_1 = 140100;
    const __IPHONE_14_2 = 140200;
    const __IPHONE_14_3 = 140300;
    const __IPHONE_14_5 = 140500;
    const __IPHONE_14_6 = 140600;
    const __IPHONE_14_7 = 140700;
    const __IPHONE_14_8 = 140800;
    const __IPHONE_15_0 = 150000;
    const __IPHONE_15_1 = 150100;
    const __IPHONE_15_2 = 150200;
    const __IPHONE_15_3 = 150300;
    const __IPHONE_15_4 = 150400;
    const __IPHONE_16_0 = 160000;
    const __IPHONE_16_1 = 160100;
    const __IPHONE_16_2 = 160200;
    const __IPHONE_16_3 = 160300;
    const __IPHONE_16_4 = 160400;
    const __TVOS_9_0 = 90000;
    const __TVOS_9_1 = 90100;
    const __TVOS_9_2 = 90200;
    const __TVOS_10_0 = 100000;
    const __TVOS_10_0_1 = 100001;
    const __TVOS_10_1 = 100100;
    const __TVOS_10_2 = 100200;
    const __TVOS_11_0 = 110000;
    const __TVOS_11_1 = 110100;
    const __TVOS_11_2 = 110200;
    const __TVOS_11_3 = 110300;
    const __TVOS_11_4 = 110400;
    const __TVOS_12_0 = 120000;
    const __TVOS_12_1 = 120100;
    const __TVOS_12_2 = 120200;
    const __TVOS_12_3 = 120300;
    const __TVOS_12_4 = 120400;
    const __TVOS_13_0 = 130000;
    const __TVOS_13_2 = 130200;
    const __TVOS_13_3 = 130300;
    const __TVOS_13_4 = 130400;
    const __TVOS_14_0 = 140000;
    const __TVOS_14_1 = 140100;
    const __TVOS_14_2 = 140200;
    const __TVOS_14_3 = 140300;
    const __TVOS_14_5 = 140500;
    const __TVOS_14_6 = 140600;
    const __TVOS_14_7 = 140700;
    const __TVOS_15_0 = 150000;
    const __TVOS_15_1 = 150100;
    const __TVOS_15_2 = 150200;
    const __TVOS_15_3 = 150300;
    const __TVOS_15_4 = 150400;
    const __TVOS_16_0 = 160000;
    const __TVOS_16_1 = 160100;
    const __TVOS_16_2 = 160200;
    const __TVOS_16_3 = 160300;
    const __TVOS_16_4 = 160400;
    const __WATCHOS_1_0 = 10000;
    const __WATCHOS_2_0 = 20000;
    const __WATCHOS_2_1 = 20100;
    const __WATCHOS_2_2 = 20200;
    const __WATCHOS_3_0 = 30000;
    const __WATCHOS_3_1 = 30100;
    const __WATCHOS_3_1_1 = 30101;
    const __WATCHOS_3_2 = 30200;
    const __WATCHOS_4_0 = 40000;
    const __WATCHOS_4_1 = 40100;
    const __WATCHOS_4_2 = 40200;
    const __WATCHOS_4_3 = 40300;
    const __WATCHOS_5_0 = 50000;
    const __WATCHOS_5_1 = 50100;
    const __WATCHOS_5_2 = 50200;
    const __WATCHOS_5_3 = 50300;
    const __WATCHOS_6_0 = 60000;
    const __WATCHOS_6_1 = 60100;
    const __WATCHOS_6_2 = 60200;
    const __WATCHOS_7_0 = 70000;
    const __WATCHOS_7_1 = 70100;
    const __WATCHOS_7_2 = 70200;
    const __WATCHOS_7_3 = 70300;
    const __WATCHOS_7_4 = 70400;
    const __WATCHOS_7_5 = 70500;
    const __WATCHOS_7_6 = 70600;
    const __WATCHOS_8_0 = 80000;
    const __WATCHOS_8_1 = 80100;
    const __WATCHOS_8_3 = 80300;
    const __WATCHOS_8_4 = 80400;
    const __WATCHOS_8_5 = 80500;
    const __WATCHOS_9_0 = 90000;
    const __WATCHOS_9_1 = 90100;
    const __WATCHOS_9_2 = 90200;
    const __WATCHOS_9_3 = 90300;
    const __WATCHOS_9_4 = 90400;
    const MAC_OS_X_VERSION_10_0 = 1000;
    const MAC_OS_X_VERSION_10_1 = 1010;
    const MAC_OS_X_VERSION_10_2 = 1020;
    const MAC_OS_X_VERSION_10_3 = 1030;
    const MAC_OS_X_VERSION_10_4 = 1040;
    const MAC_OS_X_VERSION_10_5 = 1050;
    const MAC_OS_X_VERSION_10_6 = 1060;
    const MAC_OS_X_VERSION_10_7 = 1070;
    const MAC_OS_X_VERSION_10_8 = 1080;
    const MAC_OS_X_VERSION_10_9 = 1090;
    const MAC_OS_X_VERSION_10_10 = 101000;
    const MAC_OS_X_VERSION_10_10_2 = 101002;
    const MAC_OS_X_VERSION_10_10_3 = 101003;
    const MAC_OS_X_VERSION_10_11 = 101100;
    const MAC_OS_X_VERSION_10_11_2 = 101102;
    const MAC_OS_X_VERSION_10_11_3 = 101103;
    const MAC_OS_X_VERSION_10_11_4 = 101104;
    const MAC_OS_X_VERSION_10_12 = 101200;
    const MAC_OS_X_VERSION_10_12_1 = 101201;
    const MAC_OS_X_VERSION_10_12_2 = 101202;
    const MAC_OS_X_VERSION_10_12_4 = 101204;
    const MAC_OS_X_VERSION_10_13 = 101300;
    const MAC_OS_X_VERSION_10_13_1 = 101301;
    const MAC_OS_X_VERSION_10_13_2 = 101302;
    const MAC_OS_X_VERSION_10_13_4 = 101304;
    const MAC_OS_X_VERSION_10_14 = 101400;
    const MAC_OS_X_VERSION_10_14_1 = 101401;
    const MAC_OS_X_VERSION_10_14_4 = 101404;
    const MAC_OS_X_VERSION_10_14_6 = 101406;
    const MAC_OS_X_VERSION_10_15 = 101500;
    const MAC_OS_X_VERSION_10_15_1 = 101501;
    const MAC_OS_X_VERSION_10_16 = 101600;
    const MAC_OS_VERSION_11_0 = 110000;
    const MAC_OS_VERSION_12_0 = 120000;
    const MAC_OS_VERSION_13_0 = 130000;
    const __DRIVERKIT_19_0 = 190000;
    const __DRIVERKIT_20_0 = 200000;
    const __DRIVERKIT_21_0 = 210000;
    const __PTHREAD_SIZE__ = 8176;
    const __PTHREAD_ATTR_SIZE__ = 56;
    const __PTHREAD_MUTEXATTR_SIZE__ = 8;
    const __PTHREAD_MUTEX_SIZE__ = 56;
    const __PTHREAD_CONDATTR_SIZE__ = 8;
    const __PTHREAD_COND_SIZE__ = 40;
    const __PTHREAD_ONCE_SIZE__ = 8;
    const __PTHREAD_RWLOCK_SIZE__ = 192;
    const __PTHREAD_RWLOCKATTR_SIZE__ = 16;
    const __DARWIN_WCHAR_MAX = 0x7fffffff;
    const _FORTIFY_SOURCE = 2;
    const RENAME_SECLUDE = 0x00000001;
    const RENAME_SWAP = 0x00000002;
    const RENAME_EXCL = 0x00000004;
    const RENAME_RESERVED1 = 0x00000008;
    const RENAME_NOFOLLOW_ANY = 0x00000010;
    const __SLBF = 0x0001;
    const __SNBF = 0x0002;
    const __SRD = 0x0004;
    const __SWR = 0x0008;
    const __SRW = 0x0010;
    const __SEOF = 0x0020;
    const __SERR = 0x0040;
    const __SMBF = 0x0080;
    const __SAPP = 0x0100;
    const __SSTR = 0x0200;
    const __SOPT = 0x0400;
    const __SNPT = 0x0800;
    const __SOFF = 0x1000;
    const __SMOD = 0x2000;
    const __SALC = 0x4000;
    const __SIGN = 0x8000;
    const _IOFBF = 0;
    const _IOLBF = 1;
    const _IONBF = 2;
    const BUFSIZ = 1024;
    const FOPEN_MAX = 20;
    const FILENAME_MAX = 1024;
    const L_tmpnam = 1024;
    const TMP_MAX = 308915776;
    const SEEK_SET = 0;
    const SEEK_CUR = 1;
    const SEEK_END = 2;
    const L_ctermid = 1024;
    const _USE_FORTIFY_LEVEL = 2;
    public static function ffi(?string $pathToSoFile = stdioFFI::SOFILE): stdioFFI { return new stdioFFI($pathToSoFile); }
    public static function sizeof($classOrObject): int { return stdioFFI::sizeof($classOrObject); }
}
class stdioFFI {
    const SOFILE = '/usr/lib/libSystem.B.dylib';
    const TYPES_DEF = 'typedef signed char __int8_t;
typedef unsigned char __uint8_t;
typedef short __int16_t;
typedef unsigned short __uint16_t;
typedef int __int32_t;
typedef unsigned int __uint32_t;
typedef long long __int64_t;
typedef unsigned long long __uint64_t;
typedef long __darwin_intptr_t;
typedef unsigned int __darwin_natural_t;
typedef int __darwin_ct_rune_t;
typedef union {
  char __mbstate8[128];
  long long _mbstateL;
} __mbstate_t;
typedef __mbstate_t __darwin_mbstate_t;
typedef long int __darwin_ptrdiff_t;
typedef long unsigned int __darwin_size_t;
typedef __builtin_va_list __darwin_va_list;
typedef int __darwin_wchar_t;
typedef __darwin_wchar_t __darwin_rune_t;
typedef unsigned int __darwin_wint_t;
typedef unsigned long __darwin_clock_t;
typedef __uint32_t __darwin_socklen_t;
typedef long __darwin_ssize_t;
typedef long __darwin_time_t;
typedef __int64_t __darwin_blkcnt_t;
typedef __int32_t __darwin_blksize_t;
typedef __int32_t __darwin_dev_t;
typedef unsigned int __darwin_fsblkcnt_t;
typedef unsigned int __darwin_fsfilcnt_t;
typedef __uint32_t __darwin_gid_t;
typedef __uint32_t __darwin_id_t;
typedef __uint64_t __darwin_ino64_t;
typedef __darwin_ino64_t __darwin_ino_t;
typedef __darwin_natural_t __darwin_mach_port_name_t;
typedef __darwin_mach_port_name_t __darwin_mach_port_t;
typedef __uint16_t __darwin_mode_t;
typedef __int64_t __darwin_off_t;
typedef __int32_t __darwin_pid_t;
typedef __uint32_t __darwin_sigset_t;
typedef __int32_t __darwin_suseconds_t;
typedef __uint32_t __darwin_uid_t;
typedef __uint32_t __darwin_useconds_t;
typedef unsigned char __darwin_uuid_t[16];
typedef char __darwin_uuid_string_t[37];
struct __darwin_pthread_handler_rec {
  void (*__routine)(void *);
  void *__arg;
  struct __darwin_pthread_handler_rec *__next;
};
struct _opaque_pthread_attr_t {
  long __sig;
  char __opaque[56];
};
struct _opaque_pthread_cond_t {
  long __sig;
  char __opaque[40];
};
struct _opaque_pthread_condattr_t {
  long __sig;
  char __opaque[8];
};
struct _opaque_pthread_mutex_t {
  long __sig;
  char __opaque[56];
};
struct _opaque_pthread_mutexattr_t {
  long __sig;
  char __opaque[8];
};
struct _opaque_pthread_once_t {
  long __sig;
  char __opaque[8];
};
struct _opaque_pthread_rwlock_t {
  long __sig;
  char __opaque[192];
};
struct _opaque_pthread_rwlockattr_t {
  long __sig;
  char __opaque[16];
};
struct _opaque_pthread_t {
  long __sig;
  struct __darwin_pthread_handler_rec *__cleanup_stack;
  char __opaque[8176];
};
typedef struct _opaque_pthread_attr_t __darwin_pthread_attr_t;
typedef struct _opaque_pthread_cond_t __darwin_pthread_cond_t;
typedef struct _opaque_pthread_condattr_t __darwin_pthread_condattr_t;
typedef unsigned long __darwin_pthread_key_t;
typedef struct _opaque_pthread_mutex_t __darwin_pthread_mutex_t;
typedef struct _opaque_pthread_mutexattr_t __darwin_pthread_mutexattr_t;
typedef struct _opaque_pthread_once_t __darwin_pthread_once_t;
typedef struct _opaque_pthread_rwlock_t __darwin_pthread_rwlock_t;
typedef struct _opaque_pthread_rwlockattr_t __darwin_pthread_rwlockattr_t;
typedef struct _opaque_pthread_t *__darwin_pthread_t;
typedef int __darwin_nl_item;
typedef int __darwin_wctrans_t;
typedef __uint32_t __darwin_wctype_t;
typedef unsigned char u_int8_t;
typedef unsigned short u_int16_t;
typedef unsigned int u_int32_t;
typedef unsigned long long u_int64_t;
typedef int64_t register_t;
typedef __darwin_intptr_t intptr_t;
typedef unsigned long uintptr_t;
typedef u_int64_t user_addr_t;
typedef u_int64_t user_size_t;
typedef int64_t user_ssize_t;
typedef int64_t user_long_t;
typedef u_int64_t user_ulong_t;
typedef int64_t user_time_t;
typedef int64_t user_off_t;
typedef u_int64_t syscall_arg_t;
typedef __darwin_va_list va_list;
typedef __darwin_off_t fpos_t;
struct __sbuf {
  unsigned char *_base;
  int _size;
};
struct __sFILEX;
typedef struct __sFILE {
  unsigned char *_p;
  int _r;
  int _w;
  short _flags;
  short _file;
  struct __sbuf _bf;
  int _lbfsize;
  void *_cookie;
  int (*_close)(void *);
  int (*_read)(void *, char *, int);
  fpos_t (*_seek)(void *, fpos_t, int);
  int (*_write)(void *, char *, int);
  struct __sbuf _ub;
  struct __sFILEX *_extra;
  int _ur;
  unsigned char _ubuf[3];
  unsigned char _nbuf[1];
  struct __sbuf _lb;
  int _blksize;
  fpos_t _offset;
} FILE;
typedef __darwin_off_t off_t;
typedef __darwin_ssize_t ssize_t;
';
    const HEADER_DEF = self::TYPES_DEF . 'int renameat(int, char *, int, char *);
int renamex_np(char *, char *, unsigned int);
int renameatx_np(int, char *, int, char *, unsigned int);
extern FILE *__stdinp;
extern FILE *__stdoutp;
extern FILE *__stderrp;
void clearerr(FILE *);
int fclose(FILE *);
int feof(FILE *);
int ferror(FILE *);
int fflush(FILE *);
int fgetc(FILE *);
int fgetpos(FILE *, fpos_t *);
char *fgets(char *, int, FILE *);
FILE *fopen(char *__filename, char *__mode) __asm__ ("_fopen");
int fprintf(FILE *, char *, ...);
int fputc(int, FILE *);
int fputs(char *, FILE *) __asm__ ("_fputs");
size_t fread(void *__ptr, size_t __size, size_t __nitems, FILE *__stream);
FILE *freopen(char *, char *, FILE *) __asm__ ("_freopen");
int fscanf(FILE *, char *, ...);
int fseek(FILE *, long, int);
int fsetpos(FILE *, fpos_t *);
long ftell(FILE *);
size_t fwrite(void *__ptr, size_t __size, size_t __nitems, FILE *__stream) __asm__ ("_fwrite");
int getc(FILE *);
int getchar(void);
__attribute__((__deprecated__)) char *gets(char *);
void perror(char *);
int printf(char *, ...);
int putc(int, FILE *);
int putchar(int);
int puts(char *);
int remove(char *);
int rename(char *__old, char *__new);
void rewind(FILE *);
int scanf(char *, ...);
void setbuf(FILE *, char *);
int setvbuf(FILE *, char *, int, size_t);
__attribute__((__deprecated__)) int sprintf(char *, char *, ...);
int sscanf(char *, char *, ...);
FILE *tmpfile(void);
__attribute__((__deprecated__)) char *tmpnam(char *);
int ungetc(int, FILE *);
int vfprintf(FILE *, char *, va_list);
int vprintf(char *, va_list);
__attribute__((__deprecated__)) int vsprintf(char *, char *, va_list);
char *ctermid(char *);
FILE *fdopen(int, char *) __asm__ ("_fdopen");
int fileno(FILE *);
int pclose(FILE *);
FILE *popen(char *, char *) __asm__ ("_popen");
int __srget(FILE *);
int __svfscanf(FILE *, char *, va_list);
int __swbuf(int, FILE *);
void flockfile(FILE *);
int ftrylockfile(FILE *);
void funlockfile(FILE *);
int getc_unlocked(FILE *);
int getchar_unlocked(void);
int putc_unlocked(int, FILE *);
int putchar_unlocked(int);
int getw(FILE *);
int putw(int, FILE *);
__attribute__((__deprecated__)) char *tempnam(char *__dir, char *__prefix) __asm__ ("_tempnam");
int fseeko(FILE *__stream, off_t __offset, int __whence);
off_t ftello(FILE *__stream);
int snprintf(char *__str, size_t __size, char *__format, ...);
int vfscanf(FILE *__stream, char *__format, va_list);
int vscanf(char *__format, va_list);
int vsnprintf(char *__str, size_t __size, char *__format, va_list);
int vsscanf(char *__str, char *__format, va_list);
int dprintf(int, char *, ...);
int vdprintf(int, char *, va_list);
ssize_t getdelim(char **__linep, size_t *__linecapp, int __delimiter, FILE *__stream);
ssize_t getline(char **__linep, size_t *__linecapp, FILE *__stream);
FILE *fmemopen(void *__buf, size_t __size, char *__mode);
FILE *open_memstream(char **__bufp, size_t *__sizep);
extern int sys_nerr;
int asprintf(char **, char *, ...);
char *ctermid_r(char *);
char *fgetln(FILE *, size_t *);
char *fmtcheck(char *, char *);
int fpurge(FILE *);
void setbuffer(FILE *, char *, int);
int setlinebuf(FILE *);
int vasprintf(char **, char *, va_list);
FILE *funopen(void *, int (*)(void *, char *, int), int (*)(void *, char *, int), fpos_t (*)(void *, fpos_t, int), int (*)(void *));
extern int __sprintf_chk(char *, int, size_t, char *, ...);
extern int __snprintf_chk(char *, size_t, int, size_t, char *, ...);
extern int __vsprintf_chk(char *, int, size_t, char *, va_list);
extern int __vsnprintf_chk(char *, size_t, int, size_t, char *, va_list);
';
    private FFI $ffi;
    private static FFI $staticFFI;
    private static \WeakMap $__arrayWeakMap;
    private array $__literalStrings = [];
    public function __construct(?string $pathToSoFile = self::SOFILE) {
        $this->ffi = FFI::cdef(self::HEADER_DEF, $pathToSoFile);
    }

    public static function cast(istdio $from, string $to): istdio {
        if (!is_a($to, istdio::class, true)) {
            throw new \LogicException("Cannot cast to a non-wrapper type");
        }
        return new $to(self::$staticFFI->cast($to::getType(), $from->getData()));
    }

    public static function makeArray(string $class, int|array $elements): istdio {
        $type = $class::getType();
        if (substr($type, -1) !== "*") {
            throw new \LogicException("Attempting to make a non-pointer element into an array");
        }
        if (is_int($elements)) {
            $cdata = self::$staticFFI->new(substr($type, 0, -1) . "[$elements]");
        } else {
            $cdata = self::$staticFFI->new(substr($type, 0, -1) . "[" . count($elements) . "]");
            foreach ($elements as $key => $raw) {
                $cdata[$key] = \is_scalar($raw) ? \is_int($raw) && $type === "char*" ? \chr($raw) : $raw : $raw->getData();
            }
        }
        $object = new $class(self::$staticFFI->cast($type, \FFI::addr($cdata)));
        self::$__arrayWeakMap[$object] = $cdata;
        return $object;
    }

    public static function sizeof($classOrObject): int {
        if (is_object($classOrObject) && $classOrObject instanceof istdio) {
            return FFI::sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, istdio::class, true)) {
            return FFI::sizeof(self::$staticFFI->type($classOrObject::getType()));
        } else {
            throw new \LogicException("Unknown class/object passed to sizeof()");
        }
    }

    public function getFFI(): FFI {
        return $this->ffi;
    }


    public function __get(string $name) {
        switch($name) {
            case '__stdinp': return new struct___sFILE_ptr($this->ffi->__stdinp);
            case '__stdoutp': return new struct___sFILE_ptr($this->ffi->__stdoutp);
            case '__stderrp': return new struct___sFILE_ptr($this->ffi->__stderrp);
            case 'sys_nerr': return $this->ffi->sys_nerr;
            default: return $this->ffi->$name;
        }
    }
    public function __set(string $name, $value) {
        switch($name) {
            case '__stdinp': (new struct___sFILE_ptr($this->ffi->__stdinp))->set($value); break;
            case '__stdoutp': (new struct___sFILE_ptr($this->ffi->__stdoutp))->set($value); break;
            case '__stderrp': (new struct___sFILE_ptr($this->ffi->__stderrp))->set($value); break;
            case 'sys_nerr': $this->ffi->sys_nerr = $value; break;
            default: return $this->ffi->$name;
        }
    }
    public function __allocCachedString(string $str): FFI\CData {
        return $this->__literalStrings[$str] ??= string_::ownedZero($str)->getData();
    }
    public function renameat(int $_0, void_ptr | string_ | null | string | array $_1, int $_2, void_ptr | string_ | null | string | array $_3): int {
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $__ffi_internal_refs_3 = [];
        if (\is_string($_3)) {
            $_3 = string_::ownedZero($_3)->getData();
        } elseif (\is_array($_3)) {
            $_ = $this->ffi->new("char[" . \count($_3) . "]");
            $_i = 0;
            if ($_3) {
                if ($_ref = \ReflectionReference::fromArrayElement($_3, \key($_3))) {
                    foreach ($_3 as $_k => $_v) {
                        $__ffi_internal_refs_3[$_i] = &$_3[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_3 = $_3 = $_;
                } else {
                    foreach ($_3 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_3 = $_;
                }
            }
        } else {
            $_3 = $_3?->getData();
            if ($_3 !== null) {
                $_3 = $this->ffi->cast("char*", $_3);
            }
        }
        $result = $this->ffi->renameat($_0, $_1, $_2, $_3);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        foreach ($__ffi_internal_refs_3 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_3[$_k];
        }
        return $result;
    }
    public function renamex_np(void_ptr | string_ | null | string | array $_0, void_ptr | string_ | null | string | array $_1, int $_2): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->renamex_np($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function renameatx_np(int $_0, void_ptr | string_ | null | string | array $_1, int $_2, void_ptr | string_ | null | string | array $_3, int $_4): int {
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $__ffi_internal_refs_3 = [];
        if (\is_string($_3)) {
            $_3 = string_::ownedZero($_3)->getData();
        } elseif (\is_array($_3)) {
            $_ = $this->ffi->new("char[" . \count($_3) . "]");
            $_i = 0;
            if ($_3) {
                if ($_ref = \ReflectionReference::fromArrayElement($_3, \key($_3))) {
                    foreach ($_3 as $_k => $_v) {
                        $__ffi_internal_refs_3[$_i] = &$_3[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_3 = $_3 = $_;
                } else {
                    foreach ($_3 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_3 = $_;
                }
            }
        } else {
            $_3 = $_3?->getData();
            if ($_3 !== null) {
                $_3 = $this->ffi->cast("char*", $_3);
            }
        }
        $result = $this->ffi->renameatx_np($_0, $_1, $_2, $_3, $_4);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        foreach ($__ffi_internal_refs_3 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_3[$_k];
        }
        return $result;
    }
    public function clearerr(void_ptr | struct___sFILE_ptr | null | array $_0): void {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $this->ffi->clearerr($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
    }
    public function fclose(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->fclose($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function feof(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->feof($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function ferror(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->ferror($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function fflush(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->fflush($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function fgetc(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->fgetc($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function fgetpos(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | long_long_ptr | null | array $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("long long[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("long long*", $_1);
            }
        }
        $result = $this->ffi->fgetpos($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function fgets(void_ptr | string_ | null | string | array $_0, int $_1, void_ptr | struct___sFILE_ptr | null | array $_2): ?string_ {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_2 = [];
        if (\is_array($_2)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_2) . "]");
            $_i = 0;
            if ($_2) {
                if ($_ref = \ReflectionReference::fromArrayElement($_2, \key($_2))) {
                    foreach ($_2 as $_k => $_v) {
                        $__ffi_internal_refs_2[$_i] = &$_2[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_2 = $_2 = $_;
                } else {
                    foreach ($_2 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_2 = $_;
                }
            }
        } else {
            $_2 = $_2?->getData();
            if ($_2 !== null) {
                $_2 = $this->ffi->cast("struct __sFILE*", $_2);
            }
        }
        $result = $this->ffi->fgets($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_2 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_2[$_k];
        }
        return $result === null ? null : new string_($result);
    }
    public function fopen(void_ptr | string_ | null | string | array $__filename, void_ptr | string_ | null | string | array $__mode): ?struct___sFILE_ptr {
        $__ffi_internal_refs__filename = [];
        if (\is_string($__filename)) {
            $__filename = string_::ownedZero($__filename)->getData();
        } elseif (\is_array($__filename)) {
            $_ = $this->ffi->new("char[" . \count($__filename) . "]");
            $_i = 0;
            if ($__filename) {
                if ($_ref = \ReflectionReference::fromArrayElement($__filename, \key($__filename))) {
                    foreach ($__filename as $_k => $_v) {
                        $__ffi_internal_refs__filename[$_i] = &$__filename[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__filename = $__filename = $_;
                } else {
                    foreach ($__filename as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__filename = $_;
                }
            }
        } else {
            $__filename = $__filename?->getData();
            if ($__filename !== null) {
                $__filename = $this->ffi->cast("char*", $__filename);
            }
        }
        $__ffi_internal_refs__mode = [];
        if (\is_string($__mode)) {
            $__mode = string_::ownedZero($__mode)->getData();
        } elseif (\is_array($__mode)) {
            $_ = $this->ffi->new("char[" . \count($__mode) . "]");
            $_i = 0;
            if ($__mode) {
                if ($_ref = \ReflectionReference::fromArrayElement($__mode, \key($__mode))) {
                    foreach ($__mode as $_k => $_v) {
                        $__ffi_internal_refs__mode[$_i] = &$__mode[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__mode = $__mode = $_;
                } else {
                    foreach ($__mode as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__mode = $_;
                }
            }
        } else {
            $__mode = $__mode?->getData();
            if ($__mode !== null) {
                $__mode = $this->ffi->cast("char*", $__mode);
            }
        }
        $result = $this->ffi->fopen($__filename, $__mode);
        foreach ($__ffi_internal_refs__filename as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__filename[$_k];
        }
        foreach ($__ffi_internal_refs__mode as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__mode[$_k];
        }
        return $result === null ? null : new struct___sFILE_ptr($result);
    }
    public function fprintf(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | string_ | null | string | array $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->fprintf($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function fputc(int $_0, void_ptr | struct___sFILE_ptr | null | array $_1): int {
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("struct __sFILE*", $_1);
            }
        }
        $result = $this->ffi->fputc($_0, $_1);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function fputs(void_ptr | string_ | null | string | array $_0, void_ptr | struct___sFILE_ptr | null | array $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("struct __sFILE*", $_1);
            }
        }
        $result = $this->ffi->fputs($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function fread(istdio_ptr | null | array $__ptr, int $__size, int $__nitems, void_ptr | struct___sFILE_ptr | null | array $__stream): int {
        $__ffi_internal_refs__ptr = [];
        if (\is_array($__ptr)) {
            $_ = $this->ffi->new("void[" . \count($__ptr) . "]");
            $_i = 0;
            if ($__ptr) {
                if ($_ref = \ReflectionReference::fromArrayElement($__ptr, \key($__ptr))) {
                    foreach ($__ptr as $_k => $_v) {
                        $__ffi_internal_refs__ptr[$_i] = &$__ptr[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__ptr = $__ptr = $_;
                } else {
                    foreach ($__ptr as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ptr = $_;
                }
            }
        } else {
            $__ptr = $__ptr?->getData();
            if ($__ptr !== null) {
                $__ptr = $this->ffi->cast("void*", $__ptr);
            }
        }
        $__ffi_internal_refs__stream = [];
        if (\is_array($__stream)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($__stream) . "]");
            $_i = 0;
            if ($__stream) {
                if ($_ref = \ReflectionReference::fromArrayElement($__stream, \key($__stream))) {
                    foreach ($__stream as $_k => $_v) {
                        $__ffi_internal_refs__stream[$_i] = &$__stream[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__stream = $__stream = $_;
                } else {
                    foreach ($__stream as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__stream = $_;
                }
            }
        } else {
            $__stream = $__stream?->getData();
            if ($__stream !== null) {
                $__stream = $this->ffi->cast("struct __sFILE*", $__stream);
            }
        }
        $result = $this->ffi->fread($__ptr, $__size, $__nitems, $__stream);
        foreach ($__ffi_internal_refs__ptr as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__ptr[$_k];
        }
        foreach ($__ffi_internal_refs__stream as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__stream[$_k];
        }
        return $result;
    }
    public function freopen(void_ptr | string_ | null | string | array $_0, void_ptr | string_ | null | string | array $_1, void_ptr | struct___sFILE_ptr | null | array $_2): ?struct___sFILE_ptr {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $__ffi_internal_refs_2 = [];
        if (\is_array($_2)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_2) . "]");
            $_i = 0;
            if ($_2) {
                if ($_ref = \ReflectionReference::fromArrayElement($_2, \key($_2))) {
                    foreach ($_2 as $_k => $_v) {
                        $__ffi_internal_refs_2[$_i] = &$_2[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_2 = $_2 = $_;
                } else {
                    foreach ($_2 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_2 = $_;
                }
            }
        } else {
            $_2 = $_2?->getData();
            if ($_2 !== null) {
                $_2 = $this->ffi->cast("struct __sFILE*", $_2);
            }
        }
        $result = $this->ffi->freopen($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        foreach ($__ffi_internal_refs_2 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_2[$_k];
        }
        return $result === null ? null : new struct___sFILE_ptr($result);
    }
    public function fscanf(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | string_ | null | string | array $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->fscanf($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function fseek(void_ptr | struct___sFILE_ptr | null | array $_0, int $_1, int $_2): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->fseek($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function fsetpos(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | long_long_ptr | null | array $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("long long[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("long long*", $_1);
            }
        }
        $result = $this->ffi->fsetpos($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function ftell(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->ftell($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function fwrite(istdio_ptr | null | array $__ptr, int $__size, int $__nitems, void_ptr | struct___sFILE_ptr | null | array $__stream): int {
        $__ffi_internal_refs__ptr = [];
        if (\is_array($__ptr)) {
            $_ = $this->ffi->new("void[" . \count($__ptr) . "]");
            $_i = 0;
            if ($__ptr) {
                if ($_ref = \ReflectionReference::fromArrayElement($__ptr, \key($__ptr))) {
                    foreach ($__ptr as $_k => $_v) {
                        $__ffi_internal_refs__ptr[$_i] = &$__ptr[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__ptr = $__ptr = $_;
                } else {
                    foreach ($__ptr as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ptr = $_;
                }
            }
        } else {
            $__ptr = $__ptr?->getData();
            if ($__ptr !== null) {
                $__ptr = $this->ffi->cast("void*", $__ptr);
            }
        }
        $__ffi_internal_refs__stream = [];
        if (\is_array($__stream)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($__stream) . "]");
            $_i = 0;
            if ($__stream) {
                if ($_ref = \ReflectionReference::fromArrayElement($__stream, \key($__stream))) {
                    foreach ($__stream as $_k => $_v) {
                        $__ffi_internal_refs__stream[$_i] = &$__stream[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__stream = $__stream = $_;
                } else {
                    foreach ($__stream as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__stream = $_;
                }
            }
        } else {
            $__stream = $__stream?->getData();
            if ($__stream !== null) {
                $__stream = $this->ffi->cast("struct __sFILE*", $__stream);
            }
        }
        $result = $this->ffi->fwrite($__ptr, $__size, $__nitems, $__stream);
        foreach ($__ffi_internal_refs__ptr as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__ptr[$_k];
        }
        foreach ($__ffi_internal_refs__stream as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__stream[$_k];
        }
        return $result;
    }
    public function getc(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->getc($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function getchar(): int {
        $result = $this->ffi->getchar();
        return $result;
    }
    public function gets(void_ptr | string_ | null | string | array $_0): ?string_ {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $result = $this->ffi->gets($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result === null ? null : new string_($result);
    }
    public function perror(void_ptr | string_ | null | string | array $_0): void {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $this->ffi->perror($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
    }
    public function printf(void_ptr | string_ | null | string | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $result = $this->ffi->printf($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function putc(int $_0, void_ptr | struct___sFILE_ptr | null | array $_1): int {
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("struct __sFILE*", $_1);
            }
        }
        $result = $this->ffi->putc($_0, $_1);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function putchar(int $_0): int {
        $result = $this->ffi->putchar($_0);
        return $result;
    }
    public function puts(void_ptr | string_ | null | string | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $result = $this->ffi->puts($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function remove(void_ptr | string_ | null | string | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $result = $this->ffi->remove($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function rename(void_ptr | string_ | null | string | array $__old, void_ptr | string_ | null | string | array $__new): int {
        $__ffi_internal_refs__old = [];
        if (\is_string($__old)) {
            $__old = string_::ownedZero($__old)->getData();
        } elseif (\is_array($__old)) {
            $_ = $this->ffi->new("char[" . \count($__old) . "]");
            $_i = 0;
            if ($__old) {
                if ($_ref = \ReflectionReference::fromArrayElement($__old, \key($__old))) {
                    foreach ($__old as $_k => $_v) {
                        $__ffi_internal_refs__old[$_i] = &$__old[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__old = $__old = $_;
                } else {
                    foreach ($__old as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__old = $_;
                }
            }
        } else {
            $__old = $__old?->getData();
            if ($__old !== null) {
                $__old = $this->ffi->cast("char*", $__old);
            }
        }
        $__ffi_internal_refs__new = [];
        if (\is_string($__new)) {
            $__new = string_::ownedZero($__new)->getData();
        } elseif (\is_array($__new)) {
            $_ = $this->ffi->new("char[" . \count($__new) . "]");
            $_i = 0;
            if ($__new) {
                if ($_ref = \ReflectionReference::fromArrayElement($__new, \key($__new))) {
                    foreach ($__new as $_k => $_v) {
                        $__ffi_internal_refs__new[$_i] = &$__new[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__new = $__new = $_;
                } else {
                    foreach ($__new as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__new = $_;
                }
            }
        } else {
            $__new = $__new?->getData();
            if ($__new !== null) {
                $__new = $this->ffi->cast("char*", $__new);
            }
        }
        $result = $this->ffi->rename($__old, $__new);
        foreach ($__ffi_internal_refs__old as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__old[$_k];
        }
        foreach ($__ffi_internal_refs__new as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__new[$_k];
        }
        return $result;
    }
    public function rewind(void_ptr | struct___sFILE_ptr | null | array $_0): void {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $this->ffi->rewind($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
    }
    public function scanf(void_ptr | string_ | null | string | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $result = $this->ffi->scanf($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function setbuf(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | string_ | null | string | array $_1): void {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $this->ffi->setbuf($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
    }
    public function setvbuf(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | string_ | null | string | array $_1, int $_2, int $_3): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->setvbuf($_0, $_1, $_2, $_3);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function sprintf(void_ptr | string_ | null | string | array $_0, void_ptr | string_ | null | string | array $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->sprintf($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function sscanf(void_ptr | string_ | null | string | array $_0, void_ptr | string_ | null | string | array $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->sscanf($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function tmpfile(): ?struct___sFILE_ptr {
        $result = $this->ffi->tmpfile();
        return $result === null ? null : new struct___sFILE_ptr($result);
    }
    public function tmpnam(void_ptr | string_ | null | string | array $_0): ?string_ {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $result = $this->ffi->tmpnam($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result === null ? null : new string_($result);
    }
    public function ungetc(int $_0, void_ptr | struct___sFILE_ptr | null | array $_1): int {
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("struct __sFILE*", $_1);
            }
        }
        $result = $this->ffi->ungetc($_0, $_1);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function vfprintf(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | string_ | null | string | array $_1, __builtin_va_list | null $_2): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $_2 = $_2?->getData();
        $result = $this->ffi->vfprintf($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function vprintf(void_ptr | string_ | null | string | array $_0, __builtin_va_list | null $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $_1 = $_1?->getData();
        $result = $this->ffi->vprintf($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function vsprintf(void_ptr | string_ | null | string | array $_0, void_ptr | string_ | null | string | array $_1, __builtin_va_list | null $_2): int {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $_2 = $_2?->getData();
        $result = $this->ffi->vsprintf($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function ctermid(void_ptr | string_ | null | string | array $_0): ?string_ {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $result = $this->ffi->ctermid($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result === null ? null : new string_($result);
    }
    public function fdopen(int $_0, void_ptr | string_ | null | string | array $_1): ?struct___sFILE_ptr {
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->fdopen($_0, $_1);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result === null ? null : new struct___sFILE_ptr($result);
    }
    public function fileno(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->fileno($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function pclose(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->pclose($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function popen(void_ptr | string_ | null | string | array $_0, void_ptr | string_ | null | string | array $_1): ?struct___sFILE_ptr {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->popen($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result === null ? null : new struct___sFILE_ptr($result);
    }
    public function flockfile(void_ptr | struct___sFILE_ptr | null | array $_0): void {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $this->ffi->flockfile($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
    }
    public function ftrylockfile(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->ftrylockfile($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function funlockfile(void_ptr | struct___sFILE_ptr | null | array $_0): void {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $this->ffi->funlockfile($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
    }
    public function getc_unlocked(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->getc_unlocked($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function getchar_unlocked(): int {
        $result = $this->ffi->getchar_unlocked();
        return $result;
    }
    public function putc_unlocked(int $_0, void_ptr | struct___sFILE_ptr | null | array $_1): int {
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("struct __sFILE*", $_1);
            }
        }
        $result = $this->ffi->putc_unlocked($_0, $_1);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function putchar_unlocked(int $_0): int {
        $result = $this->ffi->putchar_unlocked($_0);
        return $result;
    }
    public function getw(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->getw($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function putw(int $_0, void_ptr | struct___sFILE_ptr | null | array $_1): int {
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("struct __sFILE*", $_1);
            }
        }
        $result = $this->ffi->putw($_0, $_1);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function tempnam(void_ptr | string_ | null | string | array $__dir, void_ptr | string_ | null | string | array $__prefix): ?string_ {
        $__ffi_internal_refs__dir = [];
        if (\is_string($__dir)) {
            $__dir = string_::ownedZero($__dir)->getData();
        } elseif (\is_array($__dir)) {
            $_ = $this->ffi->new("char[" . \count($__dir) . "]");
            $_i = 0;
            if ($__dir) {
                if ($_ref = \ReflectionReference::fromArrayElement($__dir, \key($__dir))) {
                    foreach ($__dir as $_k => $_v) {
                        $__ffi_internal_refs__dir[$_i] = &$__dir[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__dir = $__dir = $_;
                } else {
                    foreach ($__dir as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__dir = $_;
                }
            }
        } else {
            $__dir = $__dir?->getData();
            if ($__dir !== null) {
                $__dir = $this->ffi->cast("char*", $__dir);
            }
        }
        $__ffi_internal_refs__prefix = [];
        if (\is_string($__prefix)) {
            $__prefix = string_::ownedZero($__prefix)->getData();
        } elseif (\is_array($__prefix)) {
            $_ = $this->ffi->new("char[" . \count($__prefix) . "]");
            $_i = 0;
            if ($__prefix) {
                if ($_ref = \ReflectionReference::fromArrayElement($__prefix, \key($__prefix))) {
                    foreach ($__prefix as $_k => $_v) {
                        $__ffi_internal_refs__prefix[$_i] = &$__prefix[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__prefix = $__prefix = $_;
                } else {
                    foreach ($__prefix as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__prefix = $_;
                }
            }
        } else {
            $__prefix = $__prefix?->getData();
            if ($__prefix !== null) {
                $__prefix = $this->ffi->cast("char*", $__prefix);
            }
        }
        $result = $this->ffi->tempnam($__dir, $__prefix);
        foreach ($__ffi_internal_refs__dir as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__dir[$_k];
        }
        foreach ($__ffi_internal_refs__prefix as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__prefix[$_k];
        }
        return $result === null ? null : new string_($result);
    }
    public function fseeko(void_ptr | struct___sFILE_ptr | null | array $__stream, int $__offset, int $__whence): int {
        $__ffi_internal_refs__stream = [];
        if (\is_array($__stream)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($__stream) . "]");
            $_i = 0;
            if ($__stream) {
                if ($_ref = \ReflectionReference::fromArrayElement($__stream, \key($__stream))) {
                    foreach ($__stream as $_k => $_v) {
                        $__ffi_internal_refs__stream[$_i] = &$__stream[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__stream = $__stream = $_;
                } else {
                    foreach ($__stream as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__stream = $_;
                }
            }
        } else {
            $__stream = $__stream?->getData();
            if ($__stream !== null) {
                $__stream = $this->ffi->cast("struct __sFILE*", $__stream);
            }
        }
        $result = $this->ffi->fseeko($__stream, $__offset, $__whence);
        foreach ($__ffi_internal_refs__stream as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__stream[$_k];
        }
        return $result;
    }
    public function ftello(void_ptr | struct___sFILE_ptr | null | array $__stream): int {
        $__ffi_internal_refs__stream = [];
        if (\is_array($__stream)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($__stream) . "]");
            $_i = 0;
            if ($__stream) {
                if ($_ref = \ReflectionReference::fromArrayElement($__stream, \key($__stream))) {
                    foreach ($__stream as $_k => $_v) {
                        $__ffi_internal_refs__stream[$_i] = &$__stream[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__stream = $__stream = $_;
                } else {
                    foreach ($__stream as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__stream = $_;
                }
            }
        } else {
            $__stream = $__stream?->getData();
            if ($__stream !== null) {
                $__stream = $this->ffi->cast("struct __sFILE*", $__stream);
            }
        }
        $result = $this->ffi->ftello($__stream);
        foreach ($__ffi_internal_refs__stream as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__stream[$_k];
        }
        return $result;
    }
    public function snprintf(void_ptr | string_ | null | string | array $__str, int $__size, void_ptr | string_ | null | string | array $__format): int {
        $__ffi_internal_refs__str = [];
        if (\is_string($__str)) {
            $__str = string_::ownedZero($__str)->getData();
        } elseif (\is_array($__str)) {
            $_ = $this->ffi->new("char[" . \count($__str) . "]");
            $_i = 0;
            if ($__str) {
                if ($_ref = \ReflectionReference::fromArrayElement($__str, \key($__str))) {
                    foreach ($__str as $_k => $_v) {
                        $__ffi_internal_refs__str[$_i] = &$__str[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__str = $__str = $_;
                } else {
                    foreach ($__str as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__str = $_;
                }
            }
        } else {
            $__str = $__str?->getData();
            if ($__str !== null) {
                $__str = $this->ffi->cast("char*", $__str);
            }
        }
        $__ffi_internal_refs__format = [];
        if (\is_string($__format)) {
            $__format = string_::ownedZero($__format)->getData();
        } elseif (\is_array($__format)) {
            $_ = $this->ffi->new("char[" . \count($__format) . "]");
            $_i = 0;
            if ($__format) {
                if ($_ref = \ReflectionReference::fromArrayElement($__format, \key($__format))) {
                    foreach ($__format as $_k => $_v) {
                        $__ffi_internal_refs__format[$_i] = &$__format[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__format = $__format = $_;
                } else {
                    foreach ($__format as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__format = $_;
                }
            }
        } else {
            $__format = $__format?->getData();
            if ($__format !== null) {
                $__format = $this->ffi->cast("char*", $__format);
            }
        }
        $result = $this->ffi->snprintf($__str, $__size, $__format);
        foreach ($__ffi_internal_refs__str as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__str[$_k];
        }
        foreach ($__ffi_internal_refs__format as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__format[$_k];
        }
        return $result;
    }
    public function vfscanf(void_ptr | struct___sFILE_ptr | null | array $__stream, void_ptr | string_ | null | string | array $__format, __builtin_va_list | null $_2): int {
        $__ffi_internal_refs__stream = [];
        if (\is_array($__stream)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($__stream) . "]");
            $_i = 0;
            if ($__stream) {
                if ($_ref = \ReflectionReference::fromArrayElement($__stream, \key($__stream))) {
                    foreach ($__stream as $_k => $_v) {
                        $__ffi_internal_refs__stream[$_i] = &$__stream[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__stream = $__stream = $_;
                } else {
                    foreach ($__stream as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__stream = $_;
                }
            }
        } else {
            $__stream = $__stream?->getData();
            if ($__stream !== null) {
                $__stream = $this->ffi->cast("struct __sFILE*", $__stream);
            }
        }
        $__ffi_internal_refs__format = [];
        if (\is_string($__format)) {
            $__format = string_::ownedZero($__format)->getData();
        } elseif (\is_array($__format)) {
            $_ = $this->ffi->new("char[" . \count($__format) . "]");
            $_i = 0;
            if ($__format) {
                if ($_ref = \ReflectionReference::fromArrayElement($__format, \key($__format))) {
                    foreach ($__format as $_k => $_v) {
                        $__ffi_internal_refs__format[$_i] = &$__format[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__format = $__format = $_;
                } else {
                    foreach ($__format as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__format = $_;
                }
            }
        } else {
            $__format = $__format?->getData();
            if ($__format !== null) {
                $__format = $this->ffi->cast("char*", $__format);
            }
        }
        $_2 = $_2?->getData();
        $result = $this->ffi->vfscanf($__stream, $__format, $_2);
        foreach ($__ffi_internal_refs__stream as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__stream[$_k];
        }
        foreach ($__ffi_internal_refs__format as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__format[$_k];
        }
        return $result;
    }
    public function vscanf(void_ptr | string_ | null | string | array $__format, __builtin_va_list | null $_1): int {
        $__ffi_internal_refs__format = [];
        if (\is_string($__format)) {
            $__format = string_::ownedZero($__format)->getData();
        } elseif (\is_array($__format)) {
            $_ = $this->ffi->new("char[" . \count($__format) . "]");
            $_i = 0;
            if ($__format) {
                if ($_ref = \ReflectionReference::fromArrayElement($__format, \key($__format))) {
                    foreach ($__format as $_k => $_v) {
                        $__ffi_internal_refs__format[$_i] = &$__format[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__format = $__format = $_;
                } else {
                    foreach ($__format as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__format = $_;
                }
            }
        } else {
            $__format = $__format?->getData();
            if ($__format !== null) {
                $__format = $this->ffi->cast("char*", $__format);
            }
        }
        $_1 = $_1?->getData();
        $result = $this->ffi->vscanf($__format, $_1);
        foreach ($__ffi_internal_refs__format as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__format[$_k];
        }
        return $result;
    }
    public function vsnprintf(void_ptr | string_ | null | string | array $__str, int $__size, void_ptr | string_ | null | string | array $__format, __builtin_va_list | null $_3): int {
        $__ffi_internal_refs__str = [];
        if (\is_string($__str)) {
            $__str = string_::ownedZero($__str)->getData();
        } elseif (\is_array($__str)) {
            $_ = $this->ffi->new("char[" . \count($__str) . "]");
            $_i = 0;
            if ($__str) {
                if ($_ref = \ReflectionReference::fromArrayElement($__str, \key($__str))) {
                    foreach ($__str as $_k => $_v) {
                        $__ffi_internal_refs__str[$_i] = &$__str[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__str = $__str = $_;
                } else {
                    foreach ($__str as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__str = $_;
                }
            }
        } else {
            $__str = $__str?->getData();
            if ($__str !== null) {
                $__str = $this->ffi->cast("char*", $__str);
            }
        }
        $__ffi_internal_refs__format = [];
        if (\is_string($__format)) {
            $__format = string_::ownedZero($__format)->getData();
        } elseif (\is_array($__format)) {
            $_ = $this->ffi->new("char[" . \count($__format) . "]");
            $_i = 0;
            if ($__format) {
                if ($_ref = \ReflectionReference::fromArrayElement($__format, \key($__format))) {
                    foreach ($__format as $_k => $_v) {
                        $__ffi_internal_refs__format[$_i] = &$__format[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__format = $__format = $_;
                } else {
                    foreach ($__format as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__format = $_;
                }
            }
        } else {
            $__format = $__format?->getData();
            if ($__format !== null) {
                $__format = $this->ffi->cast("char*", $__format);
            }
        }
        $_3 = $_3?->getData();
        $result = $this->ffi->vsnprintf($__str, $__size, $__format, $_3);
        foreach ($__ffi_internal_refs__str as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__str[$_k];
        }
        foreach ($__ffi_internal_refs__format as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__format[$_k];
        }
        return $result;
    }
    public function vsscanf(void_ptr | string_ | null | string | array $__str, void_ptr | string_ | null | string | array $__format, __builtin_va_list | null $_2): int {
        $__ffi_internal_refs__str = [];
        if (\is_string($__str)) {
            $__str = string_::ownedZero($__str)->getData();
        } elseif (\is_array($__str)) {
            $_ = $this->ffi->new("char[" . \count($__str) . "]");
            $_i = 0;
            if ($__str) {
                if ($_ref = \ReflectionReference::fromArrayElement($__str, \key($__str))) {
                    foreach ($__str as $_k => $_v) {
                        $__ffi_internal_refs__str[$_i] = &$__str[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__str = $__str = $_;
                } else {
                    foreach ($__str as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__str = $_;
                }
            }
        } else {
            $__str = $__str?->getData();
            if ($__str !== null) {
                $__str = $this->ffi->cast("char*", $__str);
            }
        }
        $__ffi_internal_refs__format = [];
        if (\is_string($__format)) {
            $__format = string_::ownedZero($__format)->getData();
        } elseif (\is_array($__format)) {
            $_ = $this->ffi->new("char[" . \count($__format) . "]");
            $_i = 0;
            if ($__format) {
                if ($_ref = \ReflectionReference::fromArrayElement($__format, \key($__format))) {
                    foreach ($__format as $_k => $_v) {
                        $__ffi_internal_refs__format[$_i] = &$__format[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__format = $__format = $_;
                } else {
                    foreach ($__format as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__format = $_;
                }
            }
        } else {
            $__format = $__format?->getData();
            if ($__format !== null) {
                $__format = $this->ffi->cast("char*", $__format);
            }
        }
        $_2 = $_2?->getData();
        $result = $this->ffi->vsscanf($__str, $__format, $_2);
        foreach ($__ffi_internal_refs__str as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__str[$_k];
        }
        foreach ($__ffi_internal_refs__format as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__format[$_k];
        }
        return $result;
    }
    public function dprintf(int $_0, void_ptr | string_ | null | string | array $_1): int {
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->dprintf($_0, $_1);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function vdprintf(int $_0, void_ptr | string_ | null | string | array $_1, __builtin_va_list | null $_2): int {
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $_2 = $_2?->getData();
        $result = $this->ffi->vdprintf($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function getdelim(void_ptr | string_ptr | null | array $__linep, void_ptr | size_t_ptr | null | array $__linecapp, int $__delimiter, void_ptr | struct___sFILE_ptr | null | array $__stream): int {
        $__ffi_internal_refs__linep = [];
        if (\is_array($__linep)) {
            $_ = $this->ffi->new("char*[" . \count($__linep) . "]");
            $_i = 0;
            if ($__linep) {
                if ($_ref = \ReflectionReference::fromArrayElement($__linep, \key($__linep))) {
                    foreach ($__linep as $_k => $_v) {
                        $__ffi_internal_refs__linep[$_i] = &$__linep[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__linep = $__linep = $_;
                } else {
                    foreach ($__linep as $_v) {
                        if (\is_string($_v)) {
                            $_[$_i++] = ($__ffi_internal_strings[] = string_::ownedZero($_v))->addr()->getData()[0];
                            continue;
                        }
                        $_[$_i++] = $_v?->getData();
                    }
                    $__linep = $_;
                }
            }
        } else {
            $__linep = $__linep?->getData();
            if ($__linep !== null) {
                $__linep = $this->ffi->cast("char**", $__linep);
            }
        }
        $__ffi_internal_refs__linecapp = [];
        if (\is_array($__linecapp)) {
            $_ = $this->ffi->new("size_t[" . \count($__linecapp) . "]");
            $_i = 0;
            if ($__linecapp) {
                if ($_ref = \ReflectionReference::fromArrayElement($__linecapp, \key($__linecapp))) {
                    foreach ($__linecapp as $_k => $_v) {
                        $__ffi_internal_refs__linecapp[$_i] = &$__linecapp[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__linecapp = $__linecapp = $_;
                } else {
                    foreach ($__linecapp as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__linecapp = $_;
                }
            }
        } else {
            $__linecapp = $__linecapp?->getData();
            if ($__linecapp !== null) {
                $__linecapp = $this->ffi->cast("size_t*", $__linecapp);
            }
        }
        $__ffi_internal_refs__stream = [];
        if (\is_array($__stream)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($__stream) . "]");
            $_i = 0;
            if ($__stream) {
                if ($_ref = \ReflectionReference::fromArrayElement($__stream, \key($__stream))) {
                    foreach ($__stream as $_k => $_v) {
                        $__ffi_internal_refs__stream[$_i] = &$__stream[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__stream = $__stream = $_;
                } else {
                    foreach ($__stream as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__stream = $_;
                }
            }
        } else {
            $__stream = $__stream?->getData();
            if ($__stream !== null) {
                $__stream = $this->ffi->cast("struct __sFILE*", $__stream);
            }
        }
        $result = $this->ffi->getdelim($__linep, $__linecapp, $__delimiter, $__stream);
        foreach ($__ffi_internal_refs__linep as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__linep[$_k];
        }
        foreach ($__ffi_internal_refs__linecapp as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__linecapp[$_k];
        }
        foreach ($__ffi_internal_refs__stream as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__stream[$_k];
        }
        return $result;
    }
    public function getline(void_ptr | string_ptr | null | array $__linep, void_ptr | size_t_ptr | null | array $__linecapp, void_ptr | struct___sFILE_ptr | null | array $__stream): int {
        $__ffi_internal_refs__linep = [];
        if (\is_array($__linep)) {
            $_ = $this->ffi->new("char*[" . \count($__linep) . "]");
            $_i = 0;
            if ($__linep) {
                if ($_ref = \ReflectionReference::fromArrayElement($__linep, \key($__linep))) {
                    foreach ($__linep as $_k => $_v) {
                        $__ffi_internal_refs__linep[$_i] = &$__linep[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__linep = $__linep = $_;
                } else {
                    foreach ($__linep as $_v) {
                        if (\is_string($_v)) {
                            $_[$_i++] = ($__ffi_internal_strings[] = string_::ownedZero($_v))->addr()->getData()[0];
                            continue;
                        }
                        $_[$_i++] = $_v?->getData();
                    }
                    $__linep = $_;
                }
            }
        } else {
            $__linep = $__linep?->getData();
            if ($__linep !== null) {
                $__linep = $this->ffi->cast("char**", $__linep);
            }
        }
        $__ffi_internal_refs__linecapp = [];
        if (\is_array($__linecapp)) {
            $_ = $this->ffi->new("size_t[" . \count($__linecapp) . "]");
            $_i = 0;
            if ($__linecapp) {
                if ($_ref = \ReflectionReference::fromArrayElement($__linecapp, \key($__linecapp))) {
                    foreach ($__linecapp as $_k => $_v) {
                        $__ffi_internal_refs__linecapp[$_i] = &$__linecapp[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__linecapp = $__linecapp = $_;
                } else {
                    foreach ($__linecapp as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__linecapp = $_;
                }
            }
        } else {
            $__linecapp = $__linecapp?->getData();
            if ($__linecapp !== null) {
                $__linecapp = $this->ffi->cast("size_t*", $__linecapp);
            }
        }
        $__ffi_internal_refs__stream = [];
        if (\is_array($__stream)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($__stream) . "]");
            $_i = 0;
            if ($__stream) {
                if ($_ref = \ReflectionReference::fromArrayElement($__stream, \key($__stream))) {
                    foreach ($__stream as $_k => $_v) {
                        $__ffi_internal_refs__stream[$_i] = &$__stream[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__stream = $__stream = $_;
                } else {
                    foreach ($__stream as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__stream = $_;
                }
            }
        } else {
            $__stream = $__stream?->getData();
            if ($__stream !== null) {
                $__stream = $this->ffi->cast("struct __sFILE*", $__stream);
            }
        }
        $result = $this->ffi->getline($__linep, $__linecapp, $__stream);
        foreach ($__ffi_internal_refs__linep as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__linep[$_k];
        }
        foreach ($__ffi_internal_refs__linecapp as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__linecapp[$_k];
        }
        foreach ($__ffi_internal_refs__stream as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__stream[$_k];
        }
        return $result;
    }
    public function fmemopen(istdio_ptr | null | array $__buf, int $__size, void_ptr | string_ | null | string | array $__mode): ?struct___sFILE_ptr {
        $__ffi_internal_refs__buf = [];
        if (\is_array($__buf)) {
            $_ = $this->ffi->new("void[" . \count($__buf) . "]");
            $_i = 0;
            if ($__buf) {
                if ($_ref = \ReflectionReference::fromArrayElement($__buf, \key($__buf))) {
                    foreach ($__buf as $_k => $_v) {
                        $__ffi_internal_refs__buf[$_i] = &$__buf[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__buf = $__buf = $_;
                } else {
                    foreach ($__buf as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $__buf = $_;
                }
            }
        } else {
            $__buf = $__buf?->getData();
            if ($__buf !== null) {
                $__buf = $this->ffi->cast("void*", $__buf);
            }
        }
        $__ffi_internal_refs__mode = [];
        if (\is_string($__mode)) {
            $__mode = string_::ownedZero($__mode)->getData();
        } elseif (\is_array($__mode)) {
            $_ = $this->ffi->new("char[" . \count($__mode) . "]");
            $_i = 0;
            if ($__mode) {
                if ($_ref = \ReflectionReference::fromArrayElement($__mode, \key($__mode))) {
                    foreach ($__mode as $_k => $_v) {
                        $__ffi_internal_refs__mode[$_i] = &$__mode[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__mode = $__mode = $_;
                } else {
                    foreach ($__mode as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__mode = $_;
                }
            }
        } else {
            $__mode = $__mode?->getData();
            if ($__mode !== null) {
                $__mode = $this->ffi->cast("char*", $__mode);
            }
        }
        $result = $this->ffi->fmemopen($__buf, $__size, $__mode);
        foreach ($__ffi_internal_refs__buf as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__buf[$_k];
        }
        foreach ($__ffi_internal_refs__mode as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__mode[$_k];
        }
        return $result === null ? null : new struct___sFILE_ptr($result);
    }
    public function open_memstream(void_ptr | string_ptr | null | array $__bufp, void_ptr | size_t_ptr | null | array $__sizep): ?struct___sFILE_ptr {
        $__ffi_internal_refs__bufp = [];
        if (\is_array($__bufp)) {
            $_ = $this->ffi->new("char*[" . \count($__bufp) . "]");
            $_i = 0;
            if ($__bufp) {
                if ($_ref = \ReflectionReference::fromArrayElement($__bufp, \key($__bufp))) {
                    foreach ($__bufp as $_k => $_v) {
                        $__ffi_internal_refs__bufp[$_i] = &$__bufp[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original__bufp = $__bufp = $_;
                } else {
                    foreach ($__bufp as $_v) {
                        if (\is_string($_v)) {
                            $_[$_i++] = ($__ffi_internal_strings[] = string_::ownedZero($_v))->addr()->getData()[0];
                            continue;
                        }
                        $_[$_i++] = $_v?->getData();
                    }
                    $__bufp = $_;
                }
            }
        } else {
            $__bufp = $__bufp?->getData();
            if ($__bufp !== null) {
                $__bufp = $this->ffi->cast("char**", $__bufp);
            }
        }
        $__ffi_internal_refs__sizep = [];
        if (\is_array($__sizep)) {
            $_ = $this->ffi->new("size_t[" . \count($__sizep) . "]");
            $_i = 0;
            if ($__sizep) {
                if ($_ref = \ReflectionReference::fromArrayElement($__sizep, \key($__sizep))) {
                    foreach ($__sizep as $_k => $_v) {
                        $__ffi_internal_refs__sizep[$_i] = &$__sizep[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original__sizep = $__sizep = $_;
                } else {
                    foreach ($__sizep as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__sizep = $_;
                }
            }
        } else {
            $__sizep = $__sizep?->getData();
            if ($__sizep !== null) {
                $__sizep = $this->ffi->cast("size_t*", $__sizep);
            }
        }
        $result = $this->ffi->open_memstream($__bufp, $__sizep);
        foreach ($__ffi_internal_refs__bufp as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__bufp[$_k];
        }
        foreach ($__ffi_internal_refs__sizep as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original__sizep[$_k];
        }
        return $result === null ? null : new struct___sFILE_ptr($result);
    }
    public function asprintf(void_ptr | string_ptr | null | array $_0, void_ptr | string_ | null | string | array $_1): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("char*[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        if (\is_string($_v)) {
                            $_[$_i++] = ($__ffi_internal_strings[] = string_::ownedZero($_v))->addr()->getData()[0];
                            continue;
                        }
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char**", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->asprintf($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function ctermid_r(void_ptr | string_ | null | string | array $_0): ?string_ {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $result = $this->ffi->ctermid_r($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result === null ? null : new string_($result);
    }
    public function fgetln(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | size_t_ptr | null | array $_1): ?string_ {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("size_t[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("size_t*", $_1);
            }
        }
        $result = $this->ffi->fgetln($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result === null ? null : new string_($result);
    }
    public function fmtcheck(void_ptr | string_ | null | string | array $_0, void_ptr | string_ | null | string | array $_1): ?string_ {
        $__ffi_internal_refs_0 = [];
        if (\is_string($_0)) {
            $_0 = string_::ownedZero($_0)->getData();
        } elseif (\is_array($_0)) {
            $_ = $this->ffi->new("char[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $result = $this->ffi->fmtcheck($_0, $_1);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result === null ? null : new string_($result);
    }
    public function fpurge(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->fpurge($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function setbuffer(void_ptr | struct___sFILE_ptr | null | array $_0, void_ptr | string_ | null | string | array $_1, int $_2): void {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $this->ffi->setbuffer($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
    }
    public function setlinebuf(void_ptr | struct___sFILE_ptr | null | array $_0): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("struct __sFILE*", $_0);
            }
        }
        $result = $this->ffi->setlinebuf($_0);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        return $result;
    }
    public function vasprintf(void_ptr | string_ptr | null | array $_0, void_ptr | string_ | null | string | array $_1, __builtin_va_list | null $_2): int {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("char*[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        if (\is_string($_v)) {
                            $_[$_i++] = ($__ffi_internal_strings[] = string_::ownedZero($_v))->addr()->getData()[0];
                            continue;
                        }
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("char**", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_string($_1)) {
            $_1 = string_::ownedZero($_1)->getData();
        } elseif (\is_array($_1)) {
            $_ = $this->ffi->new("char[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v ?? 0;
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("char*", $_1);
            }
        }
        $_2 = $_2?->getData();
        $result = $this->ffi->vasprintf($_0, $_1, $_2);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        return $result;
    }
    public function funopen(istdio_ptr | null | array $_0, void_ptr | function_type_ptr | null | array $_1, void_ptr | function_type_ptr | null | array $_2, void_ptr | function_type_ptr | null | array $_3, void_ptr | function_type_ptr | null | array $_4): ?struct___sFILE_ptr {
        $__ffi_internal_refs_0 = [];
        if (\is_array($_0)) {
            $_ = $this->ffi->new("void[" . \count($_0) . "]");
            $_i = 0;
            if ($_0) {
                if ($_ref = \ReflectionReference::fromArrayElement($_0, \key($_0))) {
                    foreach ($_0 as $_k => $_v) {
                        $__ffi_internal_refs_0[$_i] = &$_0[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_0 = $_0 = $_;
                } else {
                    foreach ($_0 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_0 = $_;
                }
            }
        } else {
            $_0 = $_0?->getData();
            if ($_0 !== null) {
                $_0 = $this->ffi->cast("void*", $_0);
            }
        }
        $__ffi_internal_refs_1 = [];
        if (\is_array($_1)) {
            $_ = $this->ffi->new("function type[" . \count($_1) . "]");
            $_i = 0;
            if ($_1) {
                if ($_ref = \ReflectionReference::fromArrayElement($_1, \key($_1))) {
                    foreach ($_1 as $_k => $_v) {
                        $__ffi_internal_refs_1[$_i] = &$_1[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_1 = $_1 = $_;
                } else {
                    foreach ($_1 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_1 = $_;
                }
            }
        } else {
            $_1 = $_1?->getData();
            if ($_1 !== null) {
                $_1 = $this->ffi->cast("int(*)(void*, char*, int)", $_1);
            }
        }
        $__ffi_internal_refs_2 = [];
        if (\is_array($_2)) {
            $_ = $this->ffi->new("function type[" . \count($_2) . "]");
            $_i = 0;
            if ($_2) {
                if ($_ref = \ReflectionReference::fromArrayElement($_2, \key($_2))) {
                    foreach ($_2 as $_k => $_v) {
                        $__ffi_internal_refs_2[$_i] = &$_2[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_2 = $_2 = $_;
                } else {
                    foreach ($_2 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_2 = $_;
                }
            }
        } else {
            $_2 = $_2?->getData();
            if ($_2 !== null) {
                $_2 = $this->ffi->cast("int(*)(void*, char*, int)", $_2);
            }
        }
        $__ffi_internal_refs_3 = [];
        if (\is_array($_3)) {
            $_ = $this->ffi->new("function type[" . \count($_3) . "]");
            $_i = 0;
            if ($_3) {
                if ($_ref = \ReflectionReference::fromArrayElement($_3, \key($_3))) {
                    foreach ($_3 as $_k => $_v) {
                        $__ffi_internal_refs_3[$_i] = &$_3[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_3 = $_3 = $_;
                } else {
                    foreach ($_3 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_3 = $_;
                }
            }
        } else {
            $_3 = $_3?->getData();
            if ($_3 !== null) {
                $_3 = $this->ffi->cast("long long(*)(void*, long long, int)", $_3);
            }
        }
        $__ffi_internal_refs_4 = [];
        if (\is_array($_4)) {
            $_ = $this->ffi->new("function type[" . \count($_4) . "]");
            $_i = 0;
            if ($_4) {
                if ($_ref = \ReflectionReference::fromArrayElement($_4, \key($_4))) {
                    foreach ($_4 as $_k => $_v) {
                        $__ffi_internal_refs_4[$_i] = &$_4[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_4 = $_4 = $_;
                } else {
                    foreach ($_4 as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_4 = $_;
                }
            }
        } else {
            $_4 = $_4?->getData();
            if ($_4 !== null) {
                $_4 = $this->ffi->cast("int(*)(void*)", $_4);
            }
        }
        $result = $this->ffi->funopen($_0, $_1, $_2, $_3, $_4);
        foreach ($__ffi_internal_refs_0 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_0[$_k];
        }
        foreach ($__ffi_internal_refs_1 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_1[$_k];
        }
        foreach ($__ffi_internal_refs_2 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_2[$_k];
        }
        foreach ($__ffi_internal_refs_3 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_3[$_k];
        }
        foreach ($__ffi_internal_refs_4 as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_4[$_k];
        }
        return $result === null ? null : new struct___sFILE_ptr($result);
    }
    public function __sputc(int $_c, void_ptr | struct___sFILE_ptr | null | array $_p): int {
        $__ffi_internal_refs_p = [];
        if (\is_array($_p)) {
            $_ = $this->ffi->new("struct __sFILE[" . \count($_p) . "]");
            $_i = 0;
            if ($_p) {
                if ($_ref = \ReflectionReference::fromArrayElement($_p, \key($_p))) {
                    foreach ($_p as $_k => $_v) {
                        $__ffi_internal_refs_p[$_i] = &$_p[$_k];
                        $_[$_i++] = $_v?->getData();
                    }
                    $__ffi_internal_original_p = $_p = $_;
                } else {
                    foreach ($_p as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $_p = $_;
                }
            }
        } else {
            $_p = $_p?->getData();
            if ($_p !== null) {
                $_p = $this->ffi->cast("struct __sFILE*", $_p);
            }
        }
        $result = $this->_ffi_internal___sputc($_c, $_p);
        foreach ($__ffi_internal_refs_p as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_original_p[$_k];
        }
        return $result;
    }
    private function _ffi_internal___sputc(int $_c, FFI\CData $_p): int {
        $_c = (function ($cdata, $val) { $cdata->cdata = $val; return $cdata; })($this->ffi->new("int"), $_c);
        if (((((--(($_p)[0]->_w)->cdata))->cdata >= 0) || (((($_p)[0]->_w)->cdata >= (($_p)[0]->_lbfsize)->cdata) && (((int) ($_c)->cdata) != 10)))) {
            return ((fn() => (($_p)[0]->_p++))()[0] = ($_c)->cdata);
        } else {
            return $this->ffi->__swbuf(($_c)->cdata, $_p);
        }
    }
}

class string_ implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr { return new string_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return \ord($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = \chr($value); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while ("\0" !== $cur = $this->data[$i++]) { $ret[] = \ord($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = \ord($this->data[$i]); } } return $ret; }
    public function toString(?int $length = null): string { return $length === null ? FFI::string($this->data) : FFI::string($this->data, $length); }
    public static function persistent(string $string): self { $str = new self(FFI::cdef()->new("char[" . \strlen($string) . "]", false)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function owned(string $string): self { $str = new self(FFI::cdef()->new("char[" . \strlen($string) . "]", true)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function persistentZero(string $string): self { return self::persistent("$string\0"); }
    public static function ownedZero(string $string): self { return self::owned("$string\0"); }
    public function set(int | void_ptr | string_ $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = \chr($value);
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'char*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr { return new string_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ { return new string_($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string_ { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return string_[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new string_($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new string_($this->data[$i]); } } return $ret; }
    public function set(void_ptr | string_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr { return new string_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ptr { return new string_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return string_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new string_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new string_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | string_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr_ptr { return new string_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ptr_ptr { return new string_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return string_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new string_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new string_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | string_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr implements istdio, istdio_ptr {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr { return new void_ptr_ptr(FFI::addr($this->data)); }
    public function set(istdio_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr { return new void_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return void_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new void_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new void_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | void_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr_ptr { return new void_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return void_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new void_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new void_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | void_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return void_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new void_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new void_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | void_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class function_type_ptr implements istdio, istdio_ptr {
    private FFI\CData $data;
    private array $types;
    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(function_type_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): function_type_ptr_ptr { return new function_type_ptr_ptr(FFI::addr($this->data)); }
    public function set(callable | void_ptr | function_type_ptr $value): void {
        if ($value instanceof void_ptr) {
            $value = $value->getData();
        } elseif ($value instanceof function_type_ptr) {
            if ($value->types != $this->types) {
                throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));
            }
            $value = $value->getData();
        } else {
            $types = $this->types;
            $value = static function (...$args) use ($value, $types) {
                foreach ($args as $i => $arg) {
                    $type = $types[$i + 1];
                    if ($type === "char") {
                        $args[$i] = \chr($arg);
                    } elseif (\is_array($type)) {
                        $args[$i] = new (__NAMESPACE__ . "\\" . $type[0])($arg, array_slice($type, 1));
                    } elseif ($type !== "int" && $type !== "float") {
                        $args[$i] = new (__NAMESPACE__ . "\\" . $type)($arg);
                    }
                }
                $ret = $value(...$args);
                if ($types[0] === "int" || $types === "float") {
                    return $ret;
                } elseif ($types[0] === "char") {
                    return \chr($ret);
                } elseif ($types[0] !== null) {
                    return $ret->getData();
                }
            };
        }
        FFI::addr($this->data)[0] = $value;
    }
    public static function getType(): string { return "(*)"; }
    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(*)(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }
}
class function_type_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    private array $types;
    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(function_type_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): function_type_ptr_ptr_ptr { return new function_type_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): function_type_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->deref($offset)->set($value); }
    public function deref(int $n = 0): function_type_ptr { return new function_type_ptr($this->data[$n], $this->types); }
    /** @return function_type_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new function_type_ptr($cur, $this->types); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new function_type_ptr($this->data[$i], $this->types); } } return $ret; }
    public function set(void_ptr | function_type_ptr_ptr $value): void {
        if ($value instanceof function_type_ptr_ptr && $value->types != $this->types) {
            throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));
        }
        FFI::addr($this->data)[0] = $value;
    }
    public static function getType(): string { return "(**)"; }
    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(**)(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }
}
class function_type_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    private array $types;
    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(function_type_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): function_type_ptr_ptr_ptr_ptr { return new function_type_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): function_type_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->deref($offset)->set($value); }
    public function deref(int $n = 0): function_type_ptr_ptr { return new function_type_ptr_ptr($this->data[$n], $this->types); }
    /** @return function_type_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new function_type_ptr_ptr($cur, $this->types); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new function_type_ptr_ptr($this->data[$i], $this->types); } } return $ret; }
    public function set(void_ptr | function_type_ptr_ptr_ptr $value): void {
        if ($value instanceof function_type_ptr_ptr_ptr && $value->types != $this->types) {
            throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));
        }
        FFI::addr($this->data)[0] = $value;
    }
    public static function getType(): string { return "(***)"; }
    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(***)(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }
}
class function_type_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    private array $types;
    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(function_type_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): function_type_ptr_ptr_ptr_ptr_ptr { return new function_type_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): function_type_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->deref($offset)->set($value); }
    public function deref(int $n = 0): function_type_ptr_ptr_ptr { return new function_type_ptr_ptr_ptr($this->data[$n], $this->types); }
    /** @return function_type_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new function_type_ptr_ptr_ptr($cur, $this->types); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new function_type_ptr_ptr_ptr($this->data[$i], $this->types); } } return $ret; }
    public function set(void_ptr | function_type_ptr_ptr_ptr_ptr $value): void {
        if ($value instanceof function_type_ptr_ptr_ptr_ptr && $value->types != $this->types) {
            throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));
        }
        FFI::addr($this->data)[0] = $value;
    }
    public static function getType(): string { return "(****)"; }
    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(****)(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }
}
class __builtin_va_list implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__builtin_va_list $other): bool { return $this->data == $other->data; }
    public function addr(): __builtin_va_list_ptr { return new __builtin_va_list_ptr(FFI::addr($this->data)); }
    public function set(__builtin_va_list $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__builtin_va_list'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class __builtin_va_list_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__builtin_va_list_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __builtin_va_list_ptr_ptr { return new __builtin_va_list_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __builtin_va_list { return new __builtin_va_list($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): __builtin_va_list { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return __builtin_va_list[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new __builtin_va_list($this->data[$i]); } return $ret; }
    public function set(void_ptr | __builtin_va_list_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__builtin_va_list*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class __builtin_va_list_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__builtin_va_list_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __builtin_va_list_ptr_ptr_ptr { return new __builtin_va_list_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __builtin_va_list_ptr { return new __builtin_va_list_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): __builtin_va_list_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return __builtin_va_list_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new __builtin_va_list_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new __builtin_va_list_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | __builtin_va_list_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__builtin_va_list**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class __builtin_va_list_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__builtin_va_list_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __builtin_va_list_ptr_ptr_ptr_ptr { return new __builtin_va_list_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __builtin_va_list_ptr_ptr { return new __builtin_va_list_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): __builtin_va_list_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return __builtin_va_list_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new __builtin_va_list_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new __builtin_va_list_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | __builtin_va_list_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__builtin_va_list***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class __builtin_va_list_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__builtin_va_list_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __builtin_va_list_ptr_ptr_ptr_ptr_ptr { return new __builtin_va_list_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __builtin_va_list_ptr_ptr_ptr { return new __builtin_va_list_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): __builtin_va_list_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return __builtin_va_list_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new __builtin_va_list_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new __builtin_va_list_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | __builtin_va_list_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__builtin_va_list****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property string_ $__mbstate8
 * @property int $_mbstateL
 */
class __mbstate_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr { return new __mbstate_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__mbstate8": return new string_($this->data->__mbstate8);
            case "_mbstateL": return $this->data->_mbstateL;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__mbstate8":
                (new string_($_ = &$this->data->__mbstate8))->set($value);
                return;
            case "_mbstateL":
                $this->data->_mbstateL = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(__mbstate_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__mbstate_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property string_ $__mbstate8
 * @property int $_mbstateL
 */
class __mbstate_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr { return new __mbstate_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t { return new __mbstate_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): __mbstate_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return __mbstate_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new __mbstate_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__mbstate8": return new string_($this->data[0]->__mbstate8);
            case "_mbstateL": return $this->data[0]->_mbstateL;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__mbstate8":
                (new string_($_ = &$this->data[0]->__mbstate8))->set($value);
                return;
            case "_mbstateL":
                $this->data[0]->_mbstateL = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | __mbstate_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__mbstate_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class __mbstate_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr { return new __mbstate_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): __mbstate_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return __mbstate_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new __mbstate_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new __mbstate_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | __mbstate_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__mbstate_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class __mbstate_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr_ptr { return new __mbstate_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): __mbstate_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return __mbstate_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new __mbstate_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new __mbstate_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | __mbstate_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__mbstate_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class __mbstate_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): __mbstate_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return __mbstate_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new __mbstate_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new __mbstate_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | __mbstate_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '__mbstate_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property function_type_ptr $__routine
 * @property void_ptr $__arg
 * @property struct___darwin_pthread_handler_rec_ptr $__next
 */
class struct___darwin_pthread_handler_rec implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___darwin_pthread_handler_rec $other): bool { return $this->data == $other->data; }
    public function addr(): struct___darwin_pthread_handler_rec_ptr { return new struct___darwin_pthread_handler_rec_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__routine": return new function_type_ptr($this->data->__routine, [NULL, 'void_ptr']);
            case "__arg": return new void_ptr($this->data->__arg);
            case "__next": return new struct___darwin_pthread_handler_rec_ptr($this->data->__next);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__routine":
                (new function_type_ptr($_ = &$this->data->__routine, [NULL, 'void_ptr']))->set($value);
                return;
            case "__arg":
                (new void_ptr($_ = &$this->data->__arg))->set($value);
                return;
            case "__next":
                (new struct___darwin_pthread_handler_rec_ptr($_ = &$this->data->__next))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct___darwin_pthread_handler_rec $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __darwin_pthread_handler_rec'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property function_type_ptr $__routine
 * @property void_ptr $__arg
 * @property struct___darwin_pthread_handler_rec_ptr $__next
 */
class struct___darwin_pthread_handler_rec_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___darwin_pthread_handler_rec_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___darwin_pthread_handler_rec_ptr_ptr { return new struct___darwin_pthread_handler_rec_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___darwin_pthread_handler_rec { return new struct___darwin_pthread_handler_rec($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___darwin_pthread_handler_rec { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___darwin_pthread_handler_rec[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___darwin_pthread_handler_rec($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__routine": return new function_type_ptr($this->data[0]->__routine, [NULL, 'void_ptr']);
            case "__arg": return new void_ptr($this->data[0]->__arg);
            case "__next": return new struct___darwin_pthread_handler_rec_ptr($this->data[0]->__next);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__routine":
                (new function_type_ptr($_ = &$this->data[0]->__routine, [NULL, 'void_ptr']))->set($value);
                return;
            case "__arg":
                (new void_ptr($_ = &$this->data[0]->__arg))->set($value);
                return;
            case "__next":
                (new struct___darwin_pthread_handler_rec_ptr($_ = &$this->data[0]->__next))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct___darwin_pthread_handler_rec_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __darwin_pthread_handler_rec*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___darwin_pthread_handler_rec_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___darwin_pthread_handler_rec_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___darwin_pthread_handler_rec_ptr_ptr_ptr { return new struct___darwin_pthread_handler_rec_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___darwin_pthread_handler_rec_ptr { return new struct___darwin_pthread_handler_rec_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___darwin_pthread_handler_rec_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___darwin_pthread_handler_rec_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___darwin_pthread_handler_rec_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___darwin_pthread_handler_rec_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___darwin_pthread_handler_rec_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __darwin_pthread_handler_rec**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___darwin_pthread_handler_rec_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___darwin_pthread_handler_rec_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___darwin_pthread_handler_rec_ptr_ptr_ptr_ptr { return new struct___darwin_pthread_handler_rec_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___darwin_pthread_handler_rec_ptr_ptr { return new struct___darwin_pthread_handler_rec_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___darwin_pthread_handler_rec_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___darwin_pthread_handler_rec_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___darwin_pthread_handler_rec_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___darwin_pthread_handler_rec_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___darwin_pthread_handler_rec_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __darwin_pthread_handler_rec***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___darwin_pthread_handler_rec_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___darwin_pthread_handler_rec_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___darwin_pthread_handler_rec_ptr_ptr_ptr_ptr_ptr { return new struct___darwin_pthread_handler_rec_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___darwin_pthread_handler_rec_ptr_ptr_ptr { return new struct___darwin_pthread_handler_rec_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___darwin_pthread_handler_rec_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___darwin_pthread_handler_rec_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___darwin_pthread_handler_rec_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___darwin_pthread_handler_rec_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___darwin_pthread_handler_rec_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __darwin_pthread_handler_rec****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_attr_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_attr_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_attr_t_ptr { return new struct__opaque_pthread_attr_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_attr_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_attr_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_attr_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_attr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_attr_t_ptr_ptr { return new struct__opaque_pthread_attr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_attr_t { return new struct__opaque_pthread_attr_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_attr_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_attr_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_attr_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_attr_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_attr_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_attr_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_attr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_attr_t_ptr_ptr_ptr { return new struct__opaque_pthread_attr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_attr_t_ptr { return new struct__opaque_pthread_attr_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_attr_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_attr_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_attr_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_attr_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_attr_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_attr_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_attr_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_attr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_attr_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_attr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_attr_t_ptr_ptr { return new struct__opaque_pthread_attr_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_attr_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_attr_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_attr_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_attr_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_attr_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_attr_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_attr_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_attr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_attr_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_attr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_attr_t_ptr_ptr_ptr { return new struct__opaque_pthread_attr_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_attr_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_attr_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_attr_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_attr_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_attr_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_attr_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_cond_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_cond_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_cond_t_ptr { return new struct__opaque_pthread_cond_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_cond_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_cond_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_cond_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_cond_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_cond_t_ptr_ptr { return new struct__opaque_pthread_cond_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_cond_t { return new struct__opaque_pthread_cond_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_cond_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_cond_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_cond_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_cond_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_cond_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_cond_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_cond_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_cond_t_ptr_ptr_ptr { return new struct__opaque_pthread_cond_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_cond_t_ptr { return new struct__opaque_pthread_cond_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_cond_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_cond_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_cond_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_cond_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_cond_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_cond_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_cond_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_cond_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_cond_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_cond_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_cond_t_ptr_ptr { return new struct__opaque_pthread_cond_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_cond_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_cond_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_cond_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_cond_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_cond_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_cond_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_cond_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_cond_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_cond_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_cond_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_cond_t_ptr_ptr_ptr { return new struct__opaque_pthread_cond_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_cond_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_cond_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_cond_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_cond_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_cond_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_cond_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_condattr_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_condattr_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_condattr_t_ptr { return new struct__opaque_pthread_condattr_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_condattr_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_condattr_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_condattr_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_condattr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_condattr_t_ptr_ptr { return new struct__opaque_pthread_condattr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_condattr_t { return new struct__opaque_pthread_condattr_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_condattr_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_condattr_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_condattr_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_condattr_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_condattr_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_condattr_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_condattr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_condattr_t_ptr_ptr_ptr { return new struct__opaque_pthread_condattr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_condattr_t_ptr { return new struct__opaque_pthread_condattr_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_condattr_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_condattr_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_condattr_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_condattr_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_condattr_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_condattr_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_condattr_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_condattr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_condattr_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_condattr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_condattr_t_ptr_ptr { return new struct__opaque_pthread_condattr_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_condattr_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_condattr_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_condattr_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_condattr_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_condattr_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_condattr_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_condattr_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_condattr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_condattr_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_condattr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_condattr_t_ptr_ptr_ptr { return new struct__opaque_pthread_condattr_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_condattr_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_condattr_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_condattr_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_condattr_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_condattr_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_condattr_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_mutex_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutex_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutex_t_ptr { return new struct__opaque_pthread_mutex_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_mutex_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutex_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_mutex_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutex_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutex_t_ptr_ptr { return new struct__opaque_pthread_mutex_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_mutex_t { return new struct__opaque_pthread_mutex_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_mutex_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_mutex_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_mutex_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_mutex_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutex_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_mutex_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutex_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutex_t_ptr_ptr_ptr { return new struct__opaque_pthread_mutex_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_mutex_t_ptr { return new struct__opaque_pthread_mutex_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_mutex_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_mutex_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_mutex_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_mutex_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_mutex_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutex_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_mutex_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutex_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutex_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_mutex_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_mutex_t_ptr_ptr { return new struct__opaque_pthread_mutex_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_mutex_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_mutex_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_mutex_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_mutex_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_mutex_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutex_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_mutex_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutex_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutex_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_mutex_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_mutex_t_ptr_ptr_ptr { return new struct__opaque_pthread_mutex_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_mutex_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_mutex_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_mutex_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_mutex_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_mutex_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutex_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_mutexattr_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutexattr_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutexattr_t_ptr { return new struct__opaque_pthread_mutexattr_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_mutexattr_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutexattr_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_mutexattr_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutexattr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutexattr_t_ptr_ptr { return new struct__opaque_pthread_mutexattr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_mutexattr_t { return new struct__opaque_pthread_mutexattr_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_mutexattr_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_mutexattr_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_mutexattr_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_mutexattr_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutexattr_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_mutexattr_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutexattr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr { return new struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_mutexattr_t_ptr { return new struct__opaque_pthread_mutexattr_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_mutexattr_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_mutexattr_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_mutexattr_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_mutexattr_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_mutexattr_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutexattr_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_mutexattr_t_ptr_ptr { return new struct__opaque_pthread_mutexattr_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_mutexattr_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_mutexattr_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_mutexattr_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_mutexattr_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutexattr_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr { return new struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_mutexattr_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_once_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_once_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_once_t_ptr { return new struct__opaque_pthread_once_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_once_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_once_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_once_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_once_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_once_t_ptr_ptr { return new struct__opaque_pthread_once_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_once_t { return new struct__opaque_pthread_once_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_once_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_once_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_once_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_once_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_once_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_once_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_once_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_once_t_ptr_ptr_ptr { return new struct__opaque_pthread_once_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_once_t_ptr { return new struct__opaque_pthread_once_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_once_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_once_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_once_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_once_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_once_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_once_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_once_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_once_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_once_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_once_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_once_t_ptr_ptr { return new struct__opaque_pthread_once_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_once_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_once_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_once_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_once_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_once_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_once_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_once_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_once_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_once_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_once_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_once_t_ptr_ptr_ptr { return new struct__opaque_pthread_once_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_once_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_once_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_once_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_once_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_once_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_once_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_rwlock_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlock_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlock_t_ptr { return new struct__opaque_pthread_rwlock_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_rwlock_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlock_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_rwlock_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlock_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlock_t_ptr_ptr { return new struct__opaque_pthread_rwlock_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_rwlock_t { return new struct__opaque_pthread_rwlock_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_rwlock_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_rwlock_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_rwlock_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_rwlock_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlock_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_rwlock_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlock_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlock_t_ptr_ptr_ptr { return new struct__opaque_pthread_rwlock_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_rwlock_t_ptr { return new struct__opaque_pthread_rwlock_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_rwlock_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_rwlock_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_rwlock_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_rwlock_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_rwlock_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlock_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_rwlock_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlock_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlock_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_rwlock_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_rwlock_t_ptr_ptr { return new struct__opaque_pthread_rwlock_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_rwlock_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_rwlock_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_rwlock_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_rwlock_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_rwlock_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlock_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_rwlock_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlock_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlock_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_rwlock_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_rwlock_t_ptr_ptr_ptr { return new struct__opaque_pthread_rwlock_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_rwlock_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_rwlock_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_rwlock_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_rwlock_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_rwlock_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlock_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_rwlockattr_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlockattr_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlockattr_t_ptr { return new struct__opaque_pthread_rwlockattr_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_rwlockattr_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlockattr_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property string_ $__opaque
 */
class struct__opaque_pthread_rwlockattr_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlockattr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlockattr_t_ptr_ptr { return new struct__opaque_pthread_rwlockattr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_rwlockattr_t { return new struct__opaque_pthread_rwlockattr_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_rwlockattr_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_rwlockattr_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_rwlockattr_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_rwlockattr_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlockattr_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_rwlockattr_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlockattr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr { return new struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_rwlockattr_t_ptr { return new struct__opaque_pthread_rwlockattr_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_rwlockattr_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_rwlockattr_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_rwlockattr_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_rwlockattr_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_rwlockattr_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlockattr_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_rwlockattr_t_ptr_ptr { return new struct__opaque_pthread_rwlockattr_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_rwlockattr_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_rwlockattr_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_rwlockattr_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_rwlockattr_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlockattr_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr { return new struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_rwlockattr_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property struct___darwin_pthread_handler_rec_ptr $__cleanup_stack
 * @property string_ $__opaque
 */
class struct__opaque_pthread_t implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_t_ptr { return new struct__opaque_pthread_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data->__sig;
            case "__cleanup_stack": return new struct___darwin_pthread_handler_rec_ptr($this->data->__cleanup_stack);
            case "__opaque": return new string_($this->data->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data->__sig = $value;
                return;
            case "__cleanup_stack":
                (new struct___darwin_pthread_handler_rec_ptr($_ = &$this->data->__cleanup_stack))->set($value);
                return;
            case "__opaque":
                (new string_($_ = &$this->data->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct__opaque_pthread_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_t'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $__sig
 * @property struct___darwin_pthread_handler_rec_ptr $__cleanup_stack
 * @property string_ $__opaque
 */
class struct__opaque_pthread_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_t_ptr_ptr { return new struct__opaque_pthread_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_t { return new struct__opaque_pthread_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "__sig": return $this->data[0]->__sig;
            case "__cleanup_stack": return new struct___darwin_pthread_handler_rec_ptr($this->data[0]->__cleanup_stack);
            case "__opaque": return new string_($this->data[0]->__opaque);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "__sig":
                $this->data[0]->__sig = $value;
                return;
            case "__cleanup_stack":
                (new struct___darwin_pthread_handler_rec_ptr($_ = &$this->data[0]->__cleanup_stack))->set($value);
                return;
            case "__opaque":
                (new string_($_ = &$this->data[0]->__opaque))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct__opaque_pthread_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_t_ptr_ptr_ptr { return new struct__opaque_pthread_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_t_ptr { return new struct__opaque_pthread_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_t_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_t_ptr_ptr { return new struct__opaque_pthread_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct__opaque_pthread_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct__opaque_pthread_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct__opaque_pthread_t_ptr_ptr_ptr_ptr_ptr { return new struct__opaque_pthread_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct__opaque_pthread_t_ptr_ptr_ptr { return new struct__opaque_pthread_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct__opaque_pthread_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct__opaque_pthread_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct__opaque_pthread_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct__opaque_pthread_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct__opaque_pthread_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct _opaque_pthread_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property unsigned_char_ptr $_base
 * @property int $_size
 */
class struct___sbuf implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sbuf $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sbuf_ptr { return new struct___sbuf_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "_base": return new unsigned_char_ptr($this->data->_base);
            case "_size": return $this->data->_size;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "_base":
                (new unsigned_char_ptr($_ = &$this->data->_base))->set($value);
                return;
            case "_size":
                $this->data->_size = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct___sbuf $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sbuf'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property unsigned_char_ptr $_base
 * @property int $_size
 */
class struct___sbuf_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sbuf_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sbuf_ptr_ptr { return new struct___sbuf_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sbuf { return new struct___sbuf($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sbuf { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sbuf[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sbuf($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "_base": return new unsigned_char_ptr($this->data[0]->_base);
            case "_size": return $this->data[0]->_size;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "_base":
                (new unsigned_char_ptr($_ = &$this->data[0]->_base))->set($value);
                return;
            case "_size":
                $this->data[0]->_size = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct___sbuf_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sbuf*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sbuf_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sbuf_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sbuf_ptr_ptr_ptr { return new struct___sbuf_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sbuf_ptr { return new struct___sbuf_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sbuf_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sbuf_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sbuf_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sbuf_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sbuf_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sbuf**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sbuf_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sbuf_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sbuf_ptr_ptr_ptr_ptr { return new struct___sbuf_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sbuf_ptr_ptr { return new struct___sbuf_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sbuf_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sbuf_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sbuf_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sbuf_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sbuf_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sbuf***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sbuf_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sbuf_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sbuf_ptr_ptr_ptr_ptr_ptr { return new struct___sbuf_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sbuf_ptr_ptr_ptr { return new struct___sbuf_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sbuf_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sbuf_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sbuf_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sbuf_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sbuf_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sbuf****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sFILEX implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILEX $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILEX_ptr { return new struct___sFILEX_ptr(FFI::addr($this->data)); }
    public function set(struct___sFILEX $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILEX'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sFILEX_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILEX_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILEX_ptr_ptr { return new struct___sFILEX_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sFILEX { return new struct___sFILEX($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sFILEX { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sFILEX[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sFILEX($this->data[$i]); } return $ret; }
    public function set(void_ptr | struct___sFILEX_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILEX*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sFILEX_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILEX_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILEX_ptr_ptr_ptr { return new struct___sFILEX_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sFILEX_ptr { return new struct___sFILEX_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sFILEX_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sFILEX_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sFILEX_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sFILEX_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sFILEX_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILEX**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sFILEX_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILEX_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILEX_ptr_ptr_ptr_ptr { return new struct___sFILEX_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sFILEX_ptr_ptr { return new struct___sFILEX_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sFILEX_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sFILEX_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sFILEX_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sFILEX_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sFILEX_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILEX***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sFILEX_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILEX_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILEX_ptr_ptr_ptr_ptr_ptr { return new struct___sFILEX_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sFILEX_ptr_ptr_ptr { return new struct___sFILEX_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sFILEX_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sFILEX_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sFILEX_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sFILEX_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sFILEX_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILEX****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property unsigned_char_ptr $_p
 * @property int $_r
 * @property int $_w
 * @property int $_flags
 * @property int $_file
 * @property struct___sbuf $_bf
 * @property int $_lbfsize
 * @property void_ptr $_cookie
 * @property function_type_ptr $_close
 * @property function_type_ptr $_read
 * @property function_type_ptr $_seek
 * @property function_type_ptr $_write
 * @property struct___sbuf $_ub
 * @property struct___sFILEX_ptr $_extra
 * @property int $_ur
 * @property unsigned_char_ptr $_ubuf
 * @property unsigned_char_ptr $_nbuf
 * @property struct___sbuf $_lb
 * @property int $_blksize
 * @property int $_offset
 */
class struct___sFILE implements istdio {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILE $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILE_ptr { return new struct___sFILE_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "_p": return new unsigned_char_ptr($this->data->_p);
            case "_r": return $this->data->_r;
            case "_w": return $this->data->_w;
            case "_flags": return $this->data->_flags;
            case "_file": return $this->data->_file;
            case "_bf": return new struct___sbuf($this->data->_bf);
            case "_lbfsize": return $this->data->_lbfsize;
            case "_cookie": return new void_ptr($this->data->_cookie);
            case "_close": return new function_type_ptr($this->data->_close, ['function_type_ptr', 'void_ptr']);
            case "_read": return new function_type_ptr($this->data->_read, ['function_type_ptr', 'void_ptr', 'string_', 'int']);
            case "_seek": return new function_type_ptr($this->data->_seek, ['function_type_ptr', 'void_ptr', 'int', 'int']);
            case "_write": return new function_type_ptr($this->data->_write, ['function_type_ptr', 'void_ptr', 'string_', 'int']);
            case "_ub": return new struct___sbuf($this->data->_ub);
            case "_extra": return new struct___sFILEX_ptr($this->data->_extra);
            case "_ur": return $this->data->_ur;
            case "_ubuf": return new unsigned_char_ptr($this->data->_ubuf);
            case "_nbuf": return new unsigned_char_ptr($this->data->_nbuf);
            case "_lb": return new struct___sbuf($this->data->_lb);
            case "_blksize": return $this->data->_blksize;
            case "_offset": return $this->data->_offset;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "_p":
                (new unsigned_char_ptr($_ = &$this->data->_p))->set($value);
                return;
            case "_r":
                $this->data->_r = $value;
                return;
            case "_w":
                $this->data->_w = $value;
                return;
            case "_flags":
                $this->data->_flags = $value;
                return;
            case "_file":
                $this->data->_file = $value;
                return;
            case "_bf":
                (new struct___sbuf($_ = &$this->data->_bf))->set($value);
                return;
            case "_lbfsize":
                $this->data->_lbfsize = $value;
                return;
            case "_cookie":
                (new void_ptr($_ = &$this->data->_cookie))->set($value);
                return;
            case "_close":
                (new function_type_ptr($_ = &$this->data->_close, ['function_type_ptr', 'void_ptr']))->set($value);
                return;
            case "_read":
                (new function_type_ptr($_ = &$this->data->_read, ['function_type_ptr', 'void_ptr', 'string_', 'int']))->set($value);
                return;
            case "_seek":
                (new function_type_ptr($_ = &$this->data->_seek, ['function_type_ptr', 'void_ptr', 'int', 'int']))->set($value);
                return;
            case "_write":
                (new function_type_ptr($_ = &$this->data->_write, ['function_type_ptr', 'void_ptr', 'string_', 'int']))->set($value);
                return;
            case "_ub":
                (new struct___sbuf($_ = &$this->data->_ub))->set($value);
                return;
            case "_extra":
                (new struct___sFILEX_ptr($_ = &$this->data->_extra))->set($value);
                return;
            case "_ur":
                $this->data->_ur = $value;
                return;
            case "_ubuf":
                (new unsigned_char_ptr($_ = &$this->data->_ubuf))->set($value);
                return;
            case "_nbuf":
                (new unsigned_char_ptr($_ = &$this->data->_nbuf))->set($value);
                return;
            case "_lb":
                (new struct___sbuf($_ = &$this->data->_lb))->set($value);
                return;
            case "_blksize":
                $this->data->_blksize = $value;
                return;
            case "_offset":
                $this->data->_offset = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(struct___sFILE $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILE'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property unsigned_char_ptr $_p
 * @property int $_r
 * @property int $_w
 * @property int $_flags
 * @property int $_file
 * @property struct___sbuf $_bf
 * @property int $_lbfsize
 * @property void_ptr $_cookie
 * @property function_type_ptr $_close
 * @property function_type_ptr $_read
 * @property function_type_ptr $_seek
 * @property function_type_ptr $_write
 * @property struct___sbuf $_ub
 * @property struct___sFILEX_ptr $_extra
 * @property int $_ur
 * @property unsigned_char_ptr $_ubuf
 * @property unsigned_char_ptr $_nbuf
 * @property struct___sbuf $_lb
 * @property int $_blksize
 * @property int $_offset
 */
class struct___sFILE_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILE_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILE_ptr_ptr { return new struct___sFILE_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sFILE { return new struct___sFILE($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sFILE { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sFILE[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sFILE($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "_p": return new unsigned_char_ptr($this->data[0]->_p);
            case "_r": return $this->data[0]->_r;
            case "_w": return $this->data[0]->_w;
            case "_flags": return $this->data[0]->_flags;
            case "_file": return $this->data[0]->_file;
            case "_bf": return new struct___sbuf($this->data[0]->_bf);
            case "_lbfsize": return $this->data[0]->_lbfsize;
            case "_cookie": return new void_ptr($this->data[0]->_cookie);
            case "_close": return new function_type_ptr($this->data[0]->_close, ['function_type_ptr', 'void_ptr']);
            case "_read": return new function_type_ptr($this->data[0]->_read, ['function_type_ptr', 'void_ptr', 'string_', 'int']);
            case "_seek": return new function_type_ptr($this->data[0]->_seek, ['function_type_ptr', 'void_ptr', 'int', 'int']);
            case "_write": return new function_type_ptr($this->data[0]->_write, ['function_type_ptr', 'void_ptr', 'string_', 'int']);
            case "_ub": return new struct___sbuf($this->data[0]->_ub);
            case "_extra": return new struct___sFILEX_ptr($this->data[0]->_extra);
            case "_ur": return $this->data[0]->_ur;
            case "_ubuf": return new unsigned_char_ptr($this->data[0]->_ubuf);
            case "_nbuf": return new unsigned_char_ptr($this->data[0]->_nbuf);
            case "_lb": return new struct___sbuf($this->data[0]->_lb);
            case "_blksize": return $this->data[0]->_blksize;
            case "_offset": return $this->data[0]->_offset;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "_p":
                (new unsigned_char_ptr($_ = &$this->data[0]->_p))->set($value);
                return;
            case "_r":
                $this->data[0]->_r = $value;
                return;
            case "_w":
                $this->data[0]->_w = $value;
                return;
            case "_flags":
                $this->data[0]->_flags = $value;
                return;
            case "_file":
                $this->data[0]->_file = $value;
                return;
            case "_bf":
                (new struct___sbuf($_ = &$this->data[0]->_bf))->set($value);
                return;
            case "_lbfsize":
                $this->data[0]->_lbfsize = $value;
                return;
            case "_cookie":
                (new void_ptr($_ = &$this->data[0]->_cookie))->set($value);
                return;
            case "_close":
                (new function_type_ptr($_ = &$this->data[0]->_close, ['function_type_ptr', 'void_ptr']))->set($value);
                return;
            case "_read":
                (new function_type_ptr($_ = &$this->data[0]->_read, ['function_type_ptr', 'void_ptr', 'string_', 'int']))->set($value);
                return;
            case "_seek":
                (new function_type_ptr($_ = &$this->data[0]->_seek, ['function_type_ptr', 'void_ptr', 'int', 'int']))->set($value);
                return;
            case "_write":
                (new function_type_ptr($_ = &$this->data[0]->_write, ['function_type_ptr', 'void_ptr', 'string_', 'int']))->set($value);
                return;
            case "_ub":
                (new struct___sbuf($_ = &$this->data[0]->_ub))->set($value);
                return;
            case "_extra":
                (new struct___sFILEX_ptr($_ = &$this->data[0]->_extra))->set($value);
                return;
            case "_ur":
                $this->data[0]->_ur = $value;
                return;
            case "_ubuf":
                (new unsigned_char_ptr($_ = &$this->data[0]->_ubuf))->set($value);
                return;
            case "_nbuf":
                (new unsigned_char_ptr($_ = &$this->data[0]->_nbuf))->set($value);
                return;
            case "_lb":
                (new struct___sbuf($_ = &$this->data[0]->_lb))->set($value);
                return;
            case "_blksize":
                $this->data[0]->_blksize = $value;
                return;
            case "_offset":
                $this->data[0]->_offset = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | struct___sFILE_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILE*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sFILE_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILE_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILE_ptr_ptr_ptr { return new struct___sFILE_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sFILE_ptr { return new struct___sFILE_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sFILE_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sFILE_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sFILE_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sFILE_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sFILE_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILE**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sFILE_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILE_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILE_ptr_ptr_ptr_ptr { return new struct___sFILE_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sFILE_ptr_ptr { return new struct___sFILE_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sFILE_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sFILE_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sFILE_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sFILE_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sFILE_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILE***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct___sFILE_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct___sFILE_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct___sFILE_ptr_ptr_ptr_ptr_ptr { return new struct___sFILE_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct___sFILE_ptr_ptr_ptr { return new struct___sFILE_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct___sFILE_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return struct___sFILE_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct___sFILE_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct___sFILE_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct___sFILE_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct __sFILE****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_char_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_char_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_char_ptr_ptr { return new unsigned_char_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function toString(?int $length = null): string { return $length === null ? FFI::string(FFI::cdef()->cast("char*", $this->data)) : FFI::string(FFI::cdef()->cast("char*", $this->data), $length); }
    public static function persistent(string $string): self { $str = new self(FFI::cdef()->new("unsigned char[" . \strlen($string) . "]", false)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function owned(string $string): self { $str = new self(FFI::cdef()->new("unsigned char[" . \strlen($string) . "]", true)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function persistentZero(string $string): self { return self::persistent("$string\0"); }
    public static function ownedZero(string $string): self { return self::owned("$string\0"); }
    public function set(int | void_ptr | unsigned_char_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'unsigned_char*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_char_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_char_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_char_ptr_ptr_ptr { return new unsigned_char_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_char_ptr { return new unsigned_char_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_char_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_char_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_char_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_char_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_char_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_char**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_char_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_char_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_char_ptr_ptr_ptr_ptr { return new unsigned_char_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_char_ptr_ptr { return new unsigned_char_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_char_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_char_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_char_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_char_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_char_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_char***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_char_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_char_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_char_ptr_ptr_ptr_ptr_ptr { return new unsigned_char_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_char_ptr_ptr_ptr { return new unsigned_char_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_char_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_char_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_char_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_char_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_char_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_char****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class short_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(short_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): short_ptr_ptr { return new short_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | short_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'short*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class short_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(short_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): short_ptr_ptr_ptr { return new short_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): short_ptr { return new short_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): short_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return short_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new short_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new short_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | short_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'short**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class short_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(short_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): short_ptr_ptr_ptr_ptr { return new short_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): short_ptr_ptr { return new short_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): short_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return short_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new short_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new short_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | short_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'short***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class short_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(short_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): short_ptr_ptr_ptr_ptr_ptr { return new short_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): short_ptr_ptr_ptr { return new short_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): short_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return short_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new short_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new short_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | short_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'short****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_short_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_short_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_short_ptr_ptr { return new unsigned_short_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | unsigned_short_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'unsigned_short*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_short_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_short_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_short_ptr_ptr_ptr { return new unsigned_short_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_short_ptr { return new unsigned_short_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_short_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_short_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_short_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_short_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_short_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_short**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_short_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_short_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_short_ptr_ptr_ptr_ptr { return new unsigned_short_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_short_ptr_ptr { return new unsigned_short_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_short_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_short_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_short_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_short_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_short_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_short***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_short_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_short_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_short_ptr_ptr_ptr_ptr_ptr { return new unsigned_short_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_short_ptr_ptr_ptr { return new unsigned_short_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_short_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_short_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_short_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_short_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_short_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_short****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int_ptr_ptr { return new int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | int_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'int*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int_ptr_ptr_ptr { return new int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int_ptr { return new int_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int_ptr_ptr_ptr_ptr { return new int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int_ptr_ptr { return new int_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int_ptr_ptr_ptr_ptr_ptr { return new int_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int_ptr_ptr_ptr { return new int_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_int_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_int_ptr_ptr { return new unsigned_int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | unsigned_int_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'unsigned_int*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_int_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_int_ptr_ptr_ptr { return new unsigned_int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_int_ptr { return new unsigned_int_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_int_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_int_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_int_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_int_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_int_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_int**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_int_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_int_ptr_ptr_ptr_ptr { return new unsigned_int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_int_ptr_ptr { return new unsigned_int_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_int_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_int_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_int_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_int_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_int_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_int***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_int_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_int_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_int_ptr_ptr_ptr_ptr_ptr { return new unsigned_int_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_int_ptr_ptr_ptr { return new unsigned_int_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_int_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_int_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_int_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_int_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_int_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_int****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int64_t_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int64_t_ptr_ptr { return new int64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | int64_t_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'int64_t*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int64_t_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int64_t_ptr_ptr_ptr { return new int64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int64_t_ptr { return new int64_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int64_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int64_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int64_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int64_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int64_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int64_t**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int64_t_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int64_t_ptr_ptr_ptr_ptr { return new int64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int64_t_ptr_ptr { return new int64_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int64_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int64_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int64_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int64_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int64_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int64_t***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int64_t_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int64_t_ptr_ptr_ptr_ptr_ptr { return new int64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int64_t_ptr_ptr_ptr { return new int64_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int64_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int64_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int64_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int64_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int64_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int64_t****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_long_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_long_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_long_ptr_ptr { return new unsigned_long_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | unsigned_long_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'unsigned_long*'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_long_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_long_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_long_ptr_ptr_ptr { return new unsigned_long_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_long_ptr { return new unsigned_long_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_long_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_long_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_long_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_long_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_long_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_long**'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_long_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_long_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_long_ptr_ptr_ptr_ptr { return new unsigned_long_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_long_ptr_ptr { return new unsigned_long_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_long_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_long_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_long_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_long_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_long_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_long***'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_long_ptr_ptr_ptr_ptr implements istdio, istdio_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(istdio $data): self { return stdioFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_long_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_long_ptr_ptr_ptr_ptr_ptr { return new unsigned_long_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_long_ptr_ptr_ptr { return new unsigned_long_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_long_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return stdioFFI::makeArray(self::class, $size); }
    /** @return unsigned_long_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_long_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_long_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_long_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_long****'; }
    public static function size(): int { return stdioFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
(function() { self::$staticFFI = \FFI::cdef(stdioFFI::TYPES_DEF); self::$__arrayWeakMap = new \WeakMap; })->bindTo(null, stdioFFI::class)();
\class_alias(int64_t_ptr::class, size_t_ptr::class);
\class_alias(int64_t_ptr_ptr::class, size_t_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, size_t_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, size_t_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, long_ptr::class);
\class_alias(int64_t_ptr_ptr::class, long_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, long_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, long_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, long_long_ptr::class);
\class_alias(int64_t_ptr_ptr::class, long_long_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, long_long_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, long_long_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, long_int_ptr::class);
\class_alias(int64_t_ptr_ptr::class, long_int_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, long_int_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, long_int_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr::class, unsigned_long_int_ptr::class);
\class_alias(unsigned_long_ptr_ptr::class, unsigned_long_int_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr::class, unsigned_long_int_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr_ptr::class, unsigned_long_int_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr::class, unsigned_long_long_ptr::class);
\class_alias(unsigned_long_ptr_ptr::class, unsigned_long_long_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr::class, unsigned_long_long_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr_ptr::class, unsigned_long_long_ptr_ptr_ptr_ptr::class);
\class_alias(string_::class, __int8_t_ptr::class);
\class_alias(string_ptr::class, __int8_t_ptr_ptr::class);
\class_alias(string_ptr_ptr::class, __int8_t_ptr_ptr_ptr::class);
\class_alias(string_ptr_ptr_ptr::class, __int8_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr::class, __uint8_t_ptr::class);
\class_alias(unsigned_char_ptr_ptr::class, __uint8_t_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr::class, __uint8_t_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr_ptr::class, __uint8_t_ptr_ptr_ptr_ptr::class);
\class_alias(short_ptr::class, __int16_t_ptr::class);
\class_alias(short_ptr_ptr::class, __int16_t_ptr_ptr::class);
\class_alias(short_ptr_ptr_ptr::class, __int16_t_ptr_ptr_ptr::class);
\class_alias(short_ptr_ptr_ptr_ptr::class, __int16_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_short_ptr::class, __uint16_t_ptr::class);
\class_alias(unsigned_short_ptr_ptr::class, __uint16_t_ptr_ptr::class);
\class_alias(unsigned_short_ptr_ptr_ptr::class, __uint16_t_ptr_ptr_ptr::class);
\class_alias(unsigned_short_ptr_ptr_ptr_ptr::class, __uint16_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __int32_t_ptr::class);
\class_alias(int_ptr_ptr::class, __int32_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __int32_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __int32_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __uint32_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __uint32_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __uint32_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __uint32_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_long_ptr::class, __int64_t_ptr::class);
\class_alias(long_long_ptr_ptr::class, __int64_t_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr::class, __int64_t_ptr_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr_ptr::class, __int64_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr::class, __uint64_t_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr::class, __uint64_t_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr::class, __uint64_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr_ptr::class, __uint64_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_ptr::class, __darwin_intptr_t_ptr::class);
\class_alias(long_ptr_ptr::class, __darwin_intptr_t_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr::class, __darwin_intptr_t_ptr_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr_ptr::class, __darwin_intptr_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_natural_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_natural_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_natural_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_natural_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_ct_rune_t_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_ct_rune_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_ct_rune_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_ct_rune_t_ptr_ptr_ptr_ptr::class);
\class_alias(__mbstate_t::class, __darwin_mbstate_t::class);
\class_alias(__mbstate_t_ptr::class, __darwin_mbstate_t_ptr::class);
\class_alias(__mbstate_t_ptr_ptr::class, __darwin_mbstate_t_ptr_ptr::class);
\class_alias(__mbstate_t_ptr_ptr_ptr::class, __darwin_mbstate_t_ptr_ptr_ptr::class);
\class_alias(__mbstate_t_ptr_ptr_ptr_ptr::class, __darwin_mbstate_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_int_ptr::class, __darwin_ptrdiff_t_ptr::class);
\class_alias(long_int_ptr_ptr::class, __darwin_ptrdiff_t_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr::class, __darwin_ptrdiff_t_ptr_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr_ptr::class, __darwin_ptrdiff_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr::class, __darwin_size_t_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr::class, __darwin_size_t_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr::class, __darwin_size_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr_ptr::class, __darwin_size_t_ptr_ptr_ptr_ptr::class);
\class_alias(__builtin_va_list::class, __darwin_va_list::class);
\class_alias(__builtin_va_list_ptr::class, __darwin_va_list_ptr::class);
\class_alias(__builtin_va_list_ptr_ptr::class, __darwin_va_list_ptr_ptr::class);
\class_alias(__builtin_va_list_ptr_ptr_ptr::class, __darwin_va_list_ptr_ptr_ptr::class);
\class_alias(__builtin_va_list_ptr_ptr_ptr_ptr::class, __darwin_va_list_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_wchar_t_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_wchar_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_wchar_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_wchar_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_rune_t_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_rune_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_rune_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_rune_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_wint_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_wint_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_wint_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_wint_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr::class, __darwin_clock_t_ptr::class);
\class_alias(unsigned_long_ptr_ptr::class, __darwin_clock_t_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr::class, __darwin_clock_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr_ptr::class, __darwin_clock_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_socklen_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_socklen_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_socklen_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_socklen_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_ptr::class, __darwin_ssize_t_ptr::class);
\class_alias(long_ptr_ptr::class, __darwin_ssize_t_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr::class, __darwin_ssize_t_ptr_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr_ptr::class, __darwin_ssize_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_ptr::class, __darwin_time_t_ptr::class);
\class_alias(long_ptr_ptr::class, __darwin_time_t_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr::class, __darwin_time_t_ptr_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr_ptr::class, __darwin_time_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_long_ptr::class, __darwin_blkcnt_t_ptr::class);
\class_alias(long_long_ptr_ptr::class, __darwin_blkcnt_t_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr::class, __darwin_blkcnt_t_ptr_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr_ptr::class, __darwin_blkcnt_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_blksize_t_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_blksize_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_blksize_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_blksize_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_dev_t_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_dev_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_dev_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_dev_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_fsblkcnt_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_fsblkcnt_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_fsblkcnt_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_fsblkcnt_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_fsfilcnt_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_fsfilcnt_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_fsfilcnt_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_fsfilcnt_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_gid_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_gid_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_gid_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_gid_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_id_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_id_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_id_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_id_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr::class, __darwin_ino64_t_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr::class, __darwin_ino64_t_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr::class, __darwin_ino64_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr_ptr::class, __darwin_ino64_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr::class, __darwin_ino_t_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr::class, __darwin_ino_t_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr::class, __darwin_ino_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr_ptr::class, __darwin_ino_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_mach_port_name_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_mach_port_name_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_mach_port_name_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_mach_port_name_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_mach_port_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_mach_port_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_mach_port_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_mach_port_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_short_ptr::class, __darwin_mode_t_ptr::class);
\class_alias(unsigned_short_ptr_ptr::class, __darwin_mode_t_ptr_ptr::class);
\class_alias(unsigned_short_ptr_ptr_ptr::class, __darwin_mode_t_ptr_ptr_ptr::class);
\class_alias(unsigned_short_ptr_ptr_ptr_ptr::class, __darwin_mode_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_long_ptr::class, __darwin_off_t_ptr::class);
\class_alias(long_long_ptr_ptr::class, __darwin_off_t_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr::class, __darwin_off_t_ptr_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr_ptr::class, __darwin_off_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_pid_t_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_pid_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_pid_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_pid_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_sigset_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_sigset_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_sigset_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_sigset_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_suseconds_t_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_suseconds_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_suseconds_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_suseconds_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_uid_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_uid_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_uid_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_uid_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_useconds_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_useconds_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_useconds_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_useconds_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr::class, __darwin_uuid_t::class);
\class_alias(unsigned_char_ptr_ptr::class, __darwin_uuid_t_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr::class, __darwin_uuid_t_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr_ptr::class, __darwin_uuid_t_ptr_ptr_ptr::class);
\class_alias(string_::class, __darwin_uuid_string_t::class);
\class_alias(string_ptr::class, __darwin_uuid_string_t_ptr::class);
\class_alias(string_ptr_ptr::class, __darwin_uuid_string_t_ptr_ptr::class);
\class_alias(string_ptr_ptr_ptr::class, __darwin_uuid_string_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_attr_t::class, __darwin_pthread_attr_t::class);
\class_alias(struct__opaque_pthread_attr_t_ptr::class, __darwin_pthread_attr_t_ptr::class);
\class_alias(struct__opaque_pthread_attr_t_ptr_ptr::class, __darwin_pthread_attr_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_attr_t_ptr_ptr_ptr::class, __darwin_pthread_attr_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_attr_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_attr_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_cond_t::class, __darwin_pthread_cond_t::class);
\class_alias(struct__opaque_pthread_cond_t_ptr::class, __darwin_pthread_cond_t_ptr::class);
\class_alias(struct__opaque_pthread_cond_t_ptr_ptr::class, __darwin_pthread_cond_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_cond_t_ptr_ptr_ptr::class, __darwin_pthread_cond_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_cond_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_cond_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_condattr_t::class, __darwin_pthread_condattr_t::class);
\class_alias(struct__opaque_pthread_condattr_t_ptr::class, __darwin_pthread_condattr_t_ptr::class);
\class_alias(struct__opaque_pthread_condattr_t_ptr_ptr::class, __darwin_pthread_condattr_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_condattr_t_ptr_ptr_ptr::class, __darwin_pthread_condattr_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_condattr_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_condattr_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr::class, __darwin_pthread_key_t_ptr::class);
\class_alias(unsigned_long_ptr_ptr::class, __darwin_pthread_key_t_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr::class, __darwin_pthread_key_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr_ptr::class, __darwin_pthread_key_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_mutex_t::class, __darwin_pthread_mutex_t::class);
\class_alias(struct__opaque_pthread_mutex_t_ptr::class, __darwin_pthread_mutex_t_ptr::class);
\class_alias(struct__opaque_pthread_mutex_t_ptr_ptr::class, __darwin_pthread_mutex_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_mutex_t_ptr_ptr_ptr::class, __darwin_pthread_mutex_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_mutex_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_mutex_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_mutexattr_t::class, __darwin_pthread_mutexattr_t::class);
\class_alias(struct__opaque_pthread_mutexattr_t_ptr::class, __darwin_pthread_mutexattr_t_ptr::class);
\class_alias(struct__opaque_pthread_mutexattr_t_ptr_ptr::class, __darwin_pthread_mutexattr_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr::class, __darwin_pthread_mutexattr_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_mutexattr_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_mutexattr_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_once_t::class, __darwin_pthread_once_t::class);
\class_alias(struct__opaque_pthread_once_t_ptr::class, __darwin_pthread_once_t_ptr::class);
\class_alias(struct__opaque_pthread_once_t_ptr_ptr::class, __darwin_pthread_once_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_once_t_ptr_ptr_ptr::class, __darwin_pthread_once_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_once_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_once_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_rwlock_t::class, __darwin_pthread_rwlock_t::class);
\class_alias(struct__opaque_pthread_rwlock_t_ptr::class, __darwin_pthread_rwlock_t_ptr::class);
\class_alias(struct__opaque_pthread_rwlock_t_ptr_ptr::class, __darwin_pthread_rwlock_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_rwlock_t_ptr_ptr_ptr::class, __darwin_pthread_rwlock_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_rwlock_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_rwlock_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_rwlockattr_t::class, __darwin_pthread_rwlockattr_t::class);
\class_alias(struct__opaque_pthread_rwlockattr_t_ptr::class, __darwin_pthread_rwlockattr_t_ptr::class);
\class_alias(struct__opaque_pthread_rwlockattr_t_ptr_ptr::class, __darwin_pthread_rwlockattr_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr::class, __darwin_pthread_rwlockattr_t_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_rwlockattr_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_rwlockattr_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct__opaque_pthread_t_ptr::class, __darwin_pthread_t::class);
\class_alias(struct__opaque_pthread_t_ptr_ptr::class, __darwin_pthread_t_ptr::class);
\class_alias(struct__opaque_pthread_t_ptr_ptr_ptr::class, __darwin_pthread_t_ptr_ptr::class);
\class_alias(struct__opaque_pthread_t_ptr_ptr_ptr_ptr::class, __darwin_pthread_t_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_nl_item_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_nl_item_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_nl_item_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_nl_item_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, __darwin_wctrans_t_ptr::class);
\class_alias(int_ptr_ptr::class, __darwin_wctrans_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, __darwin_wctrans_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, __darwin_wctrans_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, __darwin_wctype_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, __darwin_wctype_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, __darwin_wctype_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, __darwin_wctype_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr::class, u_int8_t_ptr::class);
\class_alias(unsigned_char_ptr_ptr::class, u_int8_t_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr::class, u_int8_t_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr_ptr::class, u_int8_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_short_ptr::class, u_int16_t_ptr::class);
\class_alias(unsigned_short_ptr_ptr::class, u_int16_t_ptr_ptr::class);
\class_alias(unsigned_short_ptr_ptr_ptr::class, u_int16_t_ptr_ptr_ptr::class);
\class_alias(unsigned_short_ptr_ptr_ptr_ptr::class, u_int16_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, u_int32_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, u_int32_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, u_int32_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, u_int32_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr::class, u_int64_t_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr::class, u_int64_t_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr::class, u_int64_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr_ptr::class, u_int64_t_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, register_t_ptr::class);
\class_alias(int64_t_ptr_ptr::class, register_t_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, register_t_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, register_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_ptr::class, intptr_t_ptr::class);
\class_alias(long_ptr_ptr::class, intptr_t_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr::class, intptr_t_ptr_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr_ptr::class, intptr_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr::class, uintptr_t_ptr::class);
\class_alias(unsigned_long_ptr_ptr::class, uintptr_t_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr::class, uintptr_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_ptr_ptr_ptr_ptr::class, uintptr_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr::class, user_addr_t_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr::class, user_addr_t_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr::class, user_addr_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr_ptr::class, user_addr_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr::class, user_size_t_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr::class, user_size_t_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr::class, user_size_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr_ptr::class, user_size_t_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, user_ssize_t_ptr::class);
\class_alias(int64_t_ptr_ptr::class, user_ssize_t_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, user_ssize_t_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, user_ssize_t_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, user_long_t_ptr::class);
\class_alias(int64_t_ptr_ptr::class, user_long_t_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, user_long_t_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, user_long_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr::class, user_ulong_t_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr::class, user_ulong_t_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr::class, user_ulong_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr_ptr::class, user_ulong_t_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, user_time_t_ptr::class);
\class_alias(int64_t_ptr_ptr::class, user_time_t_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, user_time_t_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, user_time_t_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, user_off_t_ptr::class);
\class_alias(int64_t_ptr_ptr::class, user_off_t_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, user_off_t_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, user_off_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr::class, syscall_arg_t_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr::class, syscall_arg_t_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr::class, syscall_arg_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_long_ptr_ptr_ptr_ptr::class, syscall_arg_t_ptr_ptr_ptr_ptr::class);
\class_alias(__builtin_va_list::class, va_list::class);
\class_alias(__builtin_va_list_ptr::class, va_list_ptr::class);
\class_alias(__builtin_va_list_ptr_ptr::class, va_list_ptr_ptr::class);
\class_alias(__builtin_va_list_ptr_ptr_ptr::class, va_list_ptr_ptr_ptr::class);
\class_alias(__builtin_va_list_ptr_ptr_ptr_ptr::class, va_list_ptr_ptr_ptr_ptr::class);
\class_alias(long_long_ptr::class, fpos_t_ptr::class);
\class_alias(long_long_ptr_ptr::class, fpos_t_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr::class, fpos_t_ptr_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr_ptr::class, fpos_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct___sFILE::class, FILE::class);
\class_alias(struct___sFILE_ptr::class, FILE_ptr::class);
\class_alias(struct___sFILE_ptr_ptr::class, FILE_ptr_ptr::class);
\class_alias(struct___sFILE_ptr_ptr_ptr::class, FILE_ptr_ptr_ptr::class);
\class_alias(struct___sFILE_ptr_ptr_ptr_ptr::class, FILE_ptr_ptr_ptr_ptr::class);
\class_alias(long_long_ptr::class, off_t_ptr::class);
\class_alias(long_long_ptr_ptr::class, off_t_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr::class, off_t_ptr_ptr_ptr::class);
\class_alias(long_long_ptr_ptr_ptr_ptr::class, off_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_ptr::class, ssize_t_ptr::class);
\class_alias(long_ptr_ptr::class, ssize_t_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr::class, ssize_t_ptr_ptr_ptr::class);
\class_alias(long_ptr_ptr_ptr_ptr::class, ssize_t_ptr_ptr_ptr_ptr::class);