<div class="par-item">
	<div class="par-head">CHAR: Character Sets</div>
	<div class="par-content">
		<br>
		<div class="par-subhead">Introduction</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<p>
				Character sets define the fonts used by SCUMM to draw text, such as dialogue,
				on the screen. They are stored in <tt>CHAR</tt> chunks, and
				are named resource #6.
			</p>
			<p>
				SCUMM supports 256 displayable characters in each character set. (Although
				the only SCUMM implementation I have access to appears to refuse to
				draw the @ character, for some reason.) The character set is more
				or less ASCII but may be adapted according to needs; for example,
				usually the copyright and trademark symbols are included.
			</p>
			<p>
				Character glyphs may be 1, 2 or 4 bits per pixel, and can be masked.
			</p>
		</div>

		<div class="par-subhead">Chunk Format</div>
		<div class="par-subhead-dots">&nbsp;</div>
		<div class="par-subhead-content">
			<pre class="box">
<u>Size</u>    <u>Type</u>             <u>Description</u>

8       chunk tag        CHAR chunk tag
6                        unknown
15      bytes            colour map
1       byte             number of bits per pixel
3                        unknown
1024    256*quad LE      character data offsets
			</pre>
			<p>
				The colour map contains the colours each pixel of the character glyph
				is drawn as. (I don't know how this works. There are only 15 colours
				but 16 possibly pixel values; I think pixel 0 is transparent, pixel
				1 is mapped to colour 0, 2 to 1, etc.)
			</p>
			<p>
				The character data pointers contain the offset, relative to the byte
				after the end of the colour map (byte 29), of the character data.
				This can be 0 if that particular character is not encoded in the character
				set. The character data itself is formatted as follows:
			</p>
			<pre class="box">
<u>Size</u>    <u>Type</u>             <u>Description</u>
1       byte             width of character
1       byte             height of character
1       byte             X offset
1       byte             Y offset
many    bytes...         glyph data bitstream
			</pre>
			<p>
				The X and Y offsets are added to the screen coordinates of the top-left
				corner of the glyph before drawing. This is useful for, say, shadowed
				text. Needless to say, glyphs don't all have to be the same size,
				although in all the examples I have they are the same height.
			</p>
			<p>
				The data bitstream encodes the pixels in the glyph in left-to-right,
				top-to-bottom order. Multiple pixels are encoded per byte. The pixels
				are arranged in big-endian format; so, the first pixel in the stream
				is in the top bits of the first data byte; then the bits below that;
				and so on. For example, at one bit per pixel:
			</p>
			<pre class="box">
Bit position:  7      0 7      0 ...
Words of data: 01234567 89ABCDEF
			</pre>
			<p>
				At two bits per pixel:
			</p>
			<pre class="box">
Bit position:  7      0 7      0 ...
Words of data: 00112233 44556677
			</pre>
			<p>
				And at four bits per pixel:
			</p>
			<pre class="box">
Bit position:  7      0 7      1 ...
Words of data: 00001111 22223333
			</pre>
		</div>

		<hr>
		<p style="font-size: smaller; text-align: center;">
			All material © 2000-2002 David Given, unless where stated otherwise.
		</p>
	</div>
</div>
