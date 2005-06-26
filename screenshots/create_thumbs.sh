#!/bin/sh

for i in big*.png; do
	echo "Processing $i..."
	./mkthumb.sh `echo $i | cut -c13- | cut -f1 -d.`
done
