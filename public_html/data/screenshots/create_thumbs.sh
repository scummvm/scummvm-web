#!/bin/sh

for i in *_full.png; do
	echo "Processing $i..."
	j=`basename $i _full.png`
	./mkthumb.sh $j
done
