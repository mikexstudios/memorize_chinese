memorize_chinese
================

**This script is no longer developed with a last commit in 2008.**

web app that implements a simple [spaced repetition][sr] algorithm to memorize
chinese characters. It uses a modified version of the [SuperMemo][sm]-2
algorithm that has been implemented in other spaced repetition software such as
[Anki][a].

The purpose of this script was to help me memorize chinese characters for a
college course. The current database contains about 1100 characters taken from
the Integrated Chinese textbook series.

This repository contains a `Dockerfile` built for setting up an old LAMP stack
consisting of: Debian 4.0 (Etch), Apache 2.2.3, PHP 5, and MySQL 5.0. This
setup is outdated and difficult to replicate on physical hardware but is
well-suited for a Docker image to run older PHP scripts for demonstration
purposes.

[sr]: https://en.wikipedia.org/wiki/Spaced_repetition
[sm]: https://en.wikipedia.org/wiki/SuperMemo
[a]: http://ankisrs.net/

## Usage

1. Build the `Dockerfile`:
   `docker build -t mikexstudios/memorize_chinese .`

2. Run it like:

   `docker run -d -p 80:80 mikexstudios/memorize_chinese`

   If you want to develop while running the script, mount the current 
   directory by:

   ```docker run -d -p 80:80 -v `pwd`:/var/www mikexstudios/memorize_chinese```

3. Then access the script from a browser at the docker's IP address. For 
   example if using boot2docker, get the exposed IP address with:
   `boot2docker ip`.

## Troubleshooting

If things go wrong, get a shell on the image for debugging:

`docker run -p 80:80 -it mikexstudios/memorize_chinese /bin/bash`

or connect to an already running image:

`docker exec -it [containerid] /bin/bash`
