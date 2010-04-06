# cub

By Pat Collins

Cub is a very simple template development environment and static site
generator made in PHP. It was designed to make template development easier
with the [Twig][1] template language, which borrows heavily in syntax from the
Django template language, but is written in PHP.

I find it's great for rapid prototyping, but I realized it could have a lot
more uses, so into the open source jungle it goes.

## Install it

 1. Clone the repo.
 1. Grab the submodules:
  
        git submodule update --init

## Get Started

First, point your Apache/PHP dev environment's DocumentRoot to the `public`
folder. Make sure `AllowOverride All` is set so Apache knows to load the
included `.htaccess` file.

Here's the idea:

 1. Write your templates using [Twig][1].
 1. Put your static files in the `public/static` folder.
 1. If you need data to work with, create a YAML file with some hashes in it
    and stick it in the `data` folder. This data will be available to you in
    the templates.
 1. Rinse and repeat.

When you access `/` (or `index` or `/index.html`) in your browser, cub will
find the `templates/index.html` file, compile it using Twig (which gives you
[template inheritance][2] and other cool features), and serve it up to your
browser.

## Build a static site

Sometimes you just need a static site. Anyone who has used PHP includes at
length knows it is a pain, and the concept of [template inheritance][2] has
shown us a better way.

Cub supports "compiling" your whole site into a set of files that you can
FTP/SFTP/SCP/SSH/RSYNC anywhere. It uses Rake to make the build script easy to
write and understand, so you'll need Ruby and Rake to use it.

It's simple to run the build command:

    rake

This will compile your site into static HTML files into a folder called
`build`. You can then `rsync` to your heart's desire.

## Dependencies

Cub requires Apache and at least PHP **5.2.4** and the following libraries:

  * Twig
  * sfYaml

## License

Copyright (c) 2010 Pat Collins <[burned.com](http://burned.com/)\>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to
deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
sell copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

[1]: http://www.twig-project.org
[2]: http://docs.djangoproject.com/en/dev/topics/templates/#id1