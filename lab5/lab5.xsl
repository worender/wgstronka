<?xml version="1.0" encoding="UTF-8"?>
<xsl:output method="html" encoding="UTF-8"/>

<xsl:template match="/">
    <html>
        <head>
            <title>Lab 5 Output</title>
        </head>
        <body>
            <h1>Transformed XML Data</h1>
            <table border="1">
                <tr>
                    <th>Element Name</th>
                    <th>Element Value</th>
                </tr>
                <xsl:for-each select="bill">
                    <tr>
                        <td><xsl:value-of select="customer/name"/></td>
                        
                    </tr>
                </xsl:for-each>
            </table>
        </body>
    </html>