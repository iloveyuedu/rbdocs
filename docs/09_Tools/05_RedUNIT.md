# RedUNIT

**RedBeanPHP** has been tested very well. You can find the test files on github.
The complete set of test files for RedBeanPHP is called RedUNIT. RedBeanPHP has been tested
with PHP Coverage. With version 3.0 RedBeanPHP has reached **99%** test coverage.

To run a unit test pack, type the following command in testing/cli:

<kbd>
./start.sh
</kbd>

This will run the tests. To run all mysql tests (same for Postgres,Sqlite):

<kbd>
./start.sh Mysql
</kbd>

To run a single test package:

<kbd>
./start.sh Base/Graph
</kbd>

Before you run tests yourself you might want to take a look at the
test configuration file config/test.ini
