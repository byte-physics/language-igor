# igor-linguist-syntax
A syntax highlighting for Igor Pro using textmate language for github linguist

### tmlanguage

Please respect the description of the [valid
grammar](https://macromates.com/manual/en/language_grammars) for textmate.

#### setup

* In sublime go to the menu and choose Tools/Install Package Control...
* Open the integrated command line with <kbd>CTRL</kbd>+<kbd>Shift</kbd>+<kbd>P</kbd>
* Enter 'install' and choose "Package Control Install Package"
  * Install [Neon-color-scheme](https://github.com/MattDMo/Neon-color-scheme)
  * Install [ScopeAlways](https://packagecontrol.io/packages/ScopeAlways)
* In the menu go to Preferences/Select Color Scheme and select Neon-color-scheme
* Open the integrated command line with <kbd>CTRL</kbd>+<kbd>Shift</kbd>+<kbd>P</kbd> and enter "Toggle ScopeAlways" to enable sublime showing the current scope in the status bar
* Copy the "igorpro.tmLanguage" to "/Data/Packages" in the sublime folder structure
* Select "Igor Pro" in the sublime status bar as language


* In Visual Studio Code install the "TextMate Languages (pedro-w)" extension.
* Open the "igorpro.YAML-tmLanguage" file for editing the TextMate Grammar.
* If valid convert the file to PLIST (the XML format) by opening the VS code command line with <kbd>CTRL</kbd>+<kbd>Shift</kbd>+<kbd>P</kbd> and enter "Convert to tmLanguage PLIST file"
* Save the file and copy it over to sublime for testing, sublime updates the syntax coloring automatically

##### notes
* For evaluating Regex Sublime uses the [oniguruma](https://github.com/kkos/oniguruma) library, whereas GitHub uses PCRE.
* The file colors.php is a utility script that matches an input color closest to a Github scope name. A representation of the Github colors can be found [here](https://github.com/Alhadis/language-etc/blob/master/samples/lists/scope-previews.nanorc) and the table with the color values used in the script in this [post](https://github.com/github-linguist/linguist/pull/4568#issuecomment-513739638).
* The scope names in the TextMate Grammar are specifically targeted to match the Github scope names through a mapping table. Thus, different resolved blocks are mapped to the same scope names to result in the same color to ultimately match Igor Pros syntax coloring set by the vendor.
## development

Development is done using [sublime text editor 3](http://www.sublimetext.com/).

For development using sublime as editor a color definition JSON is included in the file `sublime_colordef.part.json`. Add these colors to the color scheme that is setup in sublime. For the case of `Neon-color-scheme` the target file would be `/Data/Packages/Neon Color Scheme/Neon.sublime-color-scheme`.

### integrate in VS Code

* to be done

### linguist

#### Updating the grammar

According to the pull request template of the linguist project updating the grammar is not required as
`grammar submodules are updated automatically with each new release`. See [linguist PR template](https://github.com/github-linguist/linguist/blob/master/.github/PULL_REQUEST_TEMPLATE.md?plain=1)

For updating it locally the `add-grammar` utility script from linguist can be used:

```sh
script/add-grammar --replace language-igor https://github.com/byte-physics/language-igor
```

Note that the script requires a working docker service or it aborts silently. If docker works can be checked with e.g. `docker ps`.

#### Getting linguist running locally

Getting linguist running locally is useful to run the tests.

Linguist is written in ruby and thus required the ruby package installed. For setting up all required ruby packages (gems) it brings a script

```sh
script/bootstrap
```

However, this needs some dependencies. First one needs bundler that is a ruby package:

```sh
gem install bundler
```

And it requires some more dependencies for building the gems from the bootstrap script. The linguist readme states for Ubuntu:

```sh
sudo apt-get install build-essential cmake pkg-config libicu-dev zlib1g-dev libcurl4-openssl-dev libssl-dev ruby-dev
```

Most likely more packages are needed on a basic linux install.

Run the tests with
```sh
bundle exec rake test
```


## sources

* starting point file (PD) from [the forum](https://www.wavemetrics.com/comment/5280#comment-5280)
* [igor-pro-vim](https://github.com/t-b/igor-pro-vim) package
* [rouge](https://github.com/rouge-ruby/rouge/commit/2ce33dacb63fabefc2a0f16ee834822c001779b9)
