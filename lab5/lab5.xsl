<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet
    version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"
    version="1.0"
    indent="yes"
    encoding="utf-8" />

<xsl:template match="/">
    <html lang="pl-PL">
        <head>
            <link rel="stylesheet" href="lab5.css"/>
            <title>Laboratorium 5</title>
        </head>
        <body>
            <div class="parag">
                <h1>Store Warehouse</h1>
            </div>
            <div class="parag">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th id="name">Name</th>
                            <th>Count</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:apply-templates select="store" />
                    </tbody>
                </table>
            </div>
            
        </body>
    </html>
</xsl:template>

<xsl:template match="group">
    <tr>
        <td class="group" colspan="4"><xsl:value-of select="@name"/></td>
    </tr>
    <xsl:apply-templates select="item" />
</xsl:template>

<xsl:template match="item">
    <tr>
        <td><xsl:number/></td>
        <td><xsl:value-of select="name"/></td>
        <td><xsl:value-of select="count"/></td>
        <td><xsl:value-of select="price"/></td>
    </tr>
</xsl:template>

</xsl:stylesheet>