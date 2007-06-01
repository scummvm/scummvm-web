#!/bin/sh

for i in big*.png; do
	echo "Processing $i..."
	./mkthumb.sh `echo $i | cut -c12- | cut -f1 -d.`
done
