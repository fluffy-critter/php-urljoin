# php-urljoin
A PHP library function for joining a base URL and a potentially-relative target URL into an absolute URL

Why isn't this in the PHP standard library? WHO KNOWS.

Installation:

* Direct install: just pull `src/urljoin.php` into your project
* [Composer](https://packagist.org/packages/busybee/urljoin): `composer require busybee/urljoin`

usage:

    urljoin($base_url, $other_url);

See tests.php for test suite, as well as expected inputs and outputs. (Doing
this correctly is *way* more complicated thing than you'd think!) This
implementation strives for accuracy and, in cases of ambiguity (such as `../`
stack underflow and empty path components), defers to Python's standard library
behavior (as implemented by `urlparse.urljoin`).

Other things that you might know this as:

* Relative path concatenation
* A function for converting a relative path to an absolute URL given a base URL
* `rel2abs` and `relativeToAbsolute` (common names for this sort of function)
