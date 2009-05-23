<?xml version="1.0" encoding="iso-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="xml" indent="yes" encoding="iso-8859-1" />
	<xsl:template match="/">
		<faq xmlns:h="http://www.w3.org/TR/html4/">
			<xsl:for-each select="article/qandaset/qandadiv">
			<section>
				<title>
					<xsl:value-of select="title" />
				</title>
				<xsl:for-each select="qandaentry">
				<entry>
					<href>
						<xsl:value-of select="question/@id" />
					</href>
					<question>
						<xsl:value-of select="question" />
					</question>
					<!--<answer>
						<xsl:for-each select="answer/simpara">
							<xsl:copy-of select="." />
						</xsl:for-each>
					</answer>-->
					<xsl:copy-of select="answer" />
				</entry>
				</xsl:for-each>
			</section>
			</xsl:for-each>
		</faq>
	</xsl:template>
</xsl:stylesheet>
