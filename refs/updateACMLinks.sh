#!/bin/bash

for name in sec.php OO.php fdns.php optOO.php ccanal.php perf.php incr.php paradfa.php expl.php
do
	python insertCatLinks.py acmlinks.txt $name > a
	mv a ${name}
done
python insertLinks.py acmlinks.txt refs-by-date.php > a
mv a refs-by-date.php

#scp refs-by-date.php sec.php OO.php fdns.php optOO.php ccanal.php perf.php incr.php paradfa.php expl.php ap1.cs.vt.edu://web/research/prolangs/refs
