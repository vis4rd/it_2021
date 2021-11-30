<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet
    version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"
    version="1.0"
    indent="yes"
    encoding="utf-8" />
<xsl:template match="/">
    <html>
        <head>
            <link rel="stylesheet" href="../../styles/style.css"/>
            <title>Kluczka - Internet Technology</title>
        </head>
        <body>
            <div class="parag">
                <h1>Internet Technology 2021/22</h1>
            </div>
            <xsl:apply-templates select="body" />
            <fieldset class="about">
                <legend><span id="legend-name">About</span></legend>
                <table>
                        <tbody>
                                <tr>
                                        <th>owner:</th>
                                        <th>Aleksander Kluczka</th>
                                </tr>
                                <tr>
                                        <th>taurus:</th>
                                        <th>9kluczka</th>
                                </tr>
                                <tr>
                                        <th>e-mail:</th>
                                        <th><a href="mailto:qlootchka@student.fis.agh.edu.pl">qlootchka@student.fis.agh.edu.pl</a></th>
                                </tr>
                        </tbody>
                </table>
            </fieldset>
        </body>
    </html>
</xsl:template>

<xsl:template match="lab">
    <div class="parag">
        <h2><xsl:value-of select="title" /></h2>
        <blockquote><xsl:value-of select="task_content" /></blockquote>
    </div>
</xsl:template>
</xsl:stylesheet>
