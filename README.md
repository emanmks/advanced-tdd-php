# Advanced TDD using PHPUnit

A test-driven development projects adopted from clean coders tutorials by Robert C. Martin

## Prerequisites

In order to follow the projects here, you'd better have a decent understanding of how:
- Composer
- PHPUnit
- Clean Code Architecture
- You are watching or ever watched clean coders tutorials by Robert C. Martin
- You know about 3 principles of TDD

## Principles

- Gradually increasing
- Incrementally stepping into complexity

## Name-Inverter

This is the 1st project of this series of project with TDD implementation.
The purposes of the project is to invert given name into from pattern
`First Last` to `Last, First` pattern.

How to test:
```bash
cd name-inverter/
composer install
./vendor/vendor/phpunit/phpunit --testdox tests/
```

You'll see something like this:
```$xslt
PHPUnit 8.0.4 by Sebastian Bergmann and contributors.

NameInverter
 ✔ Given null throws an exception
 ✔ Given empty return empty string
 ✔ Given one word name return one word name
 ✔ Given first last return last first
 ✔ Trim the name before proceed
 ✔ Given first last with extra spaces return last first
 ✔ Ignore honorific name
 ✔ Post nominal stay at end

Time: 30 ms, Memory: 4.00 MB

OK (8 tests, 8 assertions)

```
For a better understanding you can see from the git commit and see the snapshot of
the changes. You'll see that its trying to implement the 3 principles of TDD.

Lesson learned from this 1st project are:
- To start small,
- Be creative,
- Implementing `The Single Assert Rule`
