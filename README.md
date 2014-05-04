# Beanstalk API Wrapper

## Installation

Just require `"seiffert/beanstalkapp": "*"` in your `composer.json`. I'll add proper version numbers soon.

## Usage

    $factory = new \Beanstalk\BeanstalkFactory();

    /** @var \Beanstalk\Beanstalk */
    $beanstalk = $factory->create([
        'username' => 'your_username',
        'accessToken' => 'abcdefghijklmnopqrstuvwxyz1234567890',
        'account' => 'your_account'
    ]);

    $beanstalk->createRepository(
        new \Beanstalk\Command\CreateRepository('testrepo', 'Test Repository', 'red', 'git')
    );

For more usage examples, see the `Tests` directory.

## Test SetUp

To run the library's test suite, you need to configure it by copying the file `Tests/config.php.dist` to
`Tests/config.php` and supply your repository configuration. You need to create a test repository and configure its
properties in `Tests/config.php` in order to be able to run the test suite successfully.
