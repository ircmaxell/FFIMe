enum A {
  A1 = 1,
  A2 = A1,
  A3 = 2,
};
typedef enum {
  B1 = 1,
  B2 = B1,
  B3 = B1 | B2,
  B4
} B;

