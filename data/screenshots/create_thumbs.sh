#!/bin/sh

for i in *-full.png; do
	echo "Processing $i..."
	j=`basename $i -full.png`
	echo ./mkthumb.sh $j
done
