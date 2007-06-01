#!/bin/sh

# Scale the image to be 256 pixels wide, and convert it to a progressive JPEG.
convert bigscummvm_$1.png -interlace line -quality 66 -resize 256 scummvm_$1.jpg
