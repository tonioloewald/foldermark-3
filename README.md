# foldermark-3

A rearchitected implementation of [foldermark](https://github.com/tonioloewald/Foldermark), 
a minimalist CMS that turns a directory structure of files in common formats together with
a simple naming convention into a nicely structured website with readable urls.

## In a nut

- a foldermark site comprises a hierarchy of folders
- each folder corresponds to a web page
- the root folder is the home page
- folder-names become page titles and urls (but you can order folders by prepending a nn_ which is omitted from the title/url)
- contents of folders are assembled in order to become pages (and you can order them by prepending nn_ which is omitted from the title/url)
- most of the file formats you care about are supported, including HTML (fragments), jpeg, gif, video, audio.
- markdown files are supported (and encouraged)

## History

The first version of foldermark created web-pages on the server-side using PHP and used a small amount
of client-side javascript for interactivity.

The second version of foldermark created web-page data in json format on the server-side using nodejs
and used a lot more client-side javascript to assemble the data into pages on the client.

This version uses a dumb PHP back-end to deliver indexes and all the "smarts" are in the client,
which is built using [b8r](https://bindinator.com). The advantages are numerous -- the PHP
implements a very simple protocol that can be re-implemented in other server-side languages
with minimal effort, the indexes are highly cacheable (and could be statically generated).
