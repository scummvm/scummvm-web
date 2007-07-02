#!/bin/sh

# Scale the image to be 256 pixels wide, and convert it to a progressive JPEG.
convert $1-full.png -interlace line -quality 66 -thumbnail 256 $1.jpg
