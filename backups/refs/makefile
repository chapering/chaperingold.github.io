# This is to create the HTML reference files from the references and the
# abbreviations files. The references files is named 'refs.bib' by default.
# The abbreviations file is named 'abbreviations' by default.

references:	publications.html

publications.html:	refs.bib abbreviations
	./refs2html
	./updateACMLinks.sh
