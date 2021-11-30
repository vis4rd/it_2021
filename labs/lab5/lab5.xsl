<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet
    version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"
    version="1.0"
    indent="yes"
    encoding="utf-8"/>
<xsl:param name="sortby">name</xsl:param>

<xsl:template match="/">
    <html lang="pl-PL">
        <head>
            <link rel="stylesheet" href="../../labs/lab5/lab5.css"/>
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
                            <th><a href="?sortby=none">No.</a></th>
                            <th id="name"><a href="?sortby=name">Name</a></th>
                            <th><a href="?sortby=count">Count</a></th>
                            <th><a href="?sortby=price">Price</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="//group">
                            <xsl:call-template name="templ_group"/>
                            <xsl:if test="$sortby = 'none'">
                                <xsl:for-each select="item">
                                    <xsl:call-template name="templ_item"/>
                                </xsl:for-each>
                            </xsl:if>

                            <xsl:if test="$sortby = 'name'">
                                <xsl:for-each select="item">
                                    <xsl:sort select="name/text()" data-type="text"/>
                                    <xsl:call-template name="templ_item"/>
                                </xsl:for-each>
                            </xsl:if>

                            <xsl:if test="$sortby = 'count'">
                                <xsl:for-each select="item">
                                    <xsl:sort select="count/text()" data-type="number"/>
                                    <xsl:call-template name="templ_item"/>
                                </xsl:for-each>
                            </xsl:if>

                            <xsl:if test="$sortby = 'price'">
                                <xsl:for-each select="item">
                                    <xsl:sort select="price/text()" data-type="number"/>
                                    <xsl:call-template name="templ_item"/>
                                </xsl:for-each>
                            </xsl:if>
                        </xsl:for-each>
                    </tbody>
                </table>
            </div>
            
        </body>
    </html>
</xsl:template>

<xsl:template name="templ_group">
    <tr>
        <td class="group" colspan="4"><xsl:value-of select="@name"/></td>
    </tr>
</xsl:template>

<xsl:template name="templ_item">
    <tr>
        <td><xsl:number/></td>
        <td><xsl:value-of select="name"/></td>
        <td><xsl:value-of select="count"/></td>
        <td><xsl:value-of select="price"/></td>
    </tr>
</xsl:template>

</xsl:stylesheet>