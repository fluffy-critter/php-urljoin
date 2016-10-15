# php-urljoin
A PHP library function for joining a base URL and a target URL into an absolute URL

Why isn't this in the PHP standard library? WHO KNOWS.

usage:

    urljoin($base_url, $other_url);

See tests.php for test suite, as well as expected inputs and outputs. (Doing this correctly is *way* more complicated thing than you'd think!)

Other things that you might know this as:

* Relative path concatenation
* `rel2abs` (a common name for this sort of function)
* `urlparse.urljoin` (from Python)
