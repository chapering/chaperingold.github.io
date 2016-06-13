# This is to create the HTML reference files from the references and the
# abbreviations files. The references files is named 'refs.bib' by default.
# The abbreviations file is named 'abbreviations' by default.

references:	publications.html

publications.html:	refs.bib abbreviations
	./refs2html
	./updateACMLinks.sh

clean:
	rm -f sec.php OO.php fdns.php optOO.php ccanal.php perf.php incr.php paradfa.php expl.php refs-by-date.php
