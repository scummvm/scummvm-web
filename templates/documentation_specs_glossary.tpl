<div class="par-item">
	<div class="par-head">Glossary</div>
	<div class="par-content">
		<dl>
			<dt>archive</dt>
			<dd>A file containing one or more chunks</dd>

			<dt>chunk</dt>
			<dd>The basic component of a SCUMM data file. A chunk is a block of data that
			starts with a chunk tag; a two or four byte indentifier of the type of data
			stored in the chunk, and the length of the chunk.  The rest of the chunk can be
			data of any type and may contain child chunks.</dd

			<dt>container chunk</dt>
			<dd>A chunk that contains child chunks. Usually the child chunks follow a
			header that may be zero or more bytes long, with no data between them.</dd>

			<dt>leaf chunk</dt>
			<dd>A chunk that does not contain any child chunks.</dd>

			<dt>quad</dt>
			<dd>A four-byte signed value. SCUMM uses both quad LEs (little endian) and quad
			BEs (big endian).</dd>

			<dt>resource</dt>
			<dd>A chunk that is important to SCUMM in some way. (Resource and chunk are
			mostly interchangeable. Chunk is used to refer to any RIFF file data block,
			resource only refers to SCUMM data blocks.)</dd>

			<dt>resource number</dt>
			<dd>See <i><a href="#named resource">named resource</a></i>.</dd>


			<dt>named resource</dt>
			<dd>A resource that appears in the SCUMM file's index.  Named resources are
			identified by a tuple of (class, number). The numbers are small integers
			counting up from zero.
			Named resources are sometimes referred to as objects, but as
			these can be easily confused with SCUMM objects it is not recommended.</dd>

			<dt>string</dt>
			<dd>Another name for an array.</dd>

			<dt>word</dt>
			<dd>A two-byte signed value. SCUMM uses both quad LEs (little endian) and quad
			BEs (big endian).</dd>
		</dl>
		<hr>
		<p style="font-size: smaller; text-align: center">
			All material &copy; 2000-2002 David Given, unless where stated otherwise.
		</p>
	</div>
</div>
