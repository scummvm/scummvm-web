#!/bin/sh

# Scale the image to be 256 pixels wide, and use 256 colors.
# As target format we use GIF, to enforce an 8bit image (for some strange
# unknown reasons, ImageMagick sometimes produces 24bit output if we
# directly convert to PNG).
convert big_scummvm_$1.png -dither -resize 256 -colors 256 tmp_$1.gif

# Convert the resulting GIF to PNG, removing unused palette entries on the way.
gif2png -O tmp_$1.gif

# Finish by cleaning up
rm tmp_$1.gif
mv tmp_$1.png scummvm_$1.png
