<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
  <body>
    <h2>Companies</h2>
    <table border="1">
      <tr>
        <th align="center">Rank</th>
        <th>Company</th>
	<th>Revenue</th>
      </tr>
      <xsl:for-each select="Fortune500/Company[rank &lt; 31]">
      <tr>
        <td align="center"><xsl:value-of select="rank" /></td>
	<td><xsl:value-of select="name" /></td>
        <td><xsl:value-of select="revenue" /></td>
      </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>
