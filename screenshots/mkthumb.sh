#!/bin/sh

# Scale the image to be 256 pixels wide, and convert it to a progressive JPEG.
convert big_scummvm_$1.png -interlace line -quality 33 -resize 256 scummvm_$1.jpg
