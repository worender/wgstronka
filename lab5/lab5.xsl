<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
    <html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Faktura-VAT</title>
        <link rel="stylesheet" href="lab5.css"/>
    </head>
    <body>
       <div id="foto"><img src="Faktura-VAT.jpg" alt="Faktura-VAT" id="faktura"/>
        <div id="dane">
            <div id="nrfaktury" class="colordane">    <xsl:value-of select="faktura/dane/nrFaktury"/>     </div>
            
            <div id="dataWystawienia1" class="data" > <xsl:value-of select="substring(faktura/dane/dataWystawienia, 9, 1)"/>  </div>
            <div id="dataWystawienia2" class="data" > <xsl:value-of select="substring(faktura/dane/dataWystawienia, 10, 1)"/>  </div>
            <div id="dataWystawienia3" class="data" > <xsl:value-of select="substring(faktura/dane/dataWystawienia, 6, 1)"/>  </div>
            <div id="dataWystawienia4" class="data" > <xsl:value-of select="substring(faktura/dane/dataWystawienia, 7, 1)"/>  </div>
            <div id="dataWystawienia5" class="data" > <xsl:value-of select="substring(faktura/dane/dataWystawienia, 3, 1)"/>  </div>
            <div id="dataWystawienia6" class="data" > <xsl:value-of select="substring(faktura/dane/dataWystawienia, 4, 1)"/>  </div>

            <div id="miejscowoscWystawienia" class="colordane"> <xsl:value-of select="faktura/dane/miejscowosc"/>  </div>

            <div id="nabywcaNazwa" class="colordane"> <xsl:value-of select="faktura/dane/nabywca/nazwa"/> </div>
            <div id="nabywcaAdres" class="colordane"> <xsl:value-of select="faktura/dane/nabywca/adres/ulica"/>, <xsl:value-of select="faktura/dane/nabywca/adres/kodPocztowy"/>, <xsl:value-of select="faktura/dane/nabywca/adres/miasto"/></div>
            <div id="nabywcaNip" class="colordane">     <xsl:value-of select="faktura/dane/nabywca/nip"/> </div>
        
            <div id="sprzedawcaNazwa" class="colordane"> <xsl:value-of select="faktura/dane/sprzedawca/podatnik"/> </div>
            <div id="sprzedawcaAdres" class="colordane"> <xsl:value-of select="faktura/dane/sprzedawca/adres/ulica"/>, <xsl:value-of select="faktura/dane/sprzedawca/adres/kodPocztowy"/>, <xsl:value-of select="faktura/dane/sprzedawca/adres/miasto"/></div>
            <div id="sprzedawcaNip" class="colordane">     <xsl:value-of select="faktura/dane/sprzedawca/nip"/> </div>

            <div id="towarnazwa" class="colordane">
                <table>
                    <xsl:for-each select="faktura/towarUslugi/pozycja">
                        
                            <tr><td><xsl:value-of select="nazwa"/> </td></tr>
                        
                    </xsl:for-each>
                </table>
            </div>

            <div id="towarIlosc" class="colordane">
                <table>
                    <xsl:for-each select="faktura/towarUslugi/pozycja">
                        
                            <tr><td><xsl:value-of select="ilosc"/> </td></tr>
                        
                    </xsl:for-each>
                </table>
            </div> 
            
            <div id="towarCenaJednostkowaZL" class="colordane">
                <table>
                    <xsl:for-each select="faktura/towarUslugi/pozycja">
                        
                            <tr><td><xsl:value-of select="cenaNetto"/> </td></tr>
                        
                    </xsl:for-each>
                </table>
            </div>

            <div id="towarWNetto" class="colordane">
                <table>
                    <xsl:for-each select="faktura/towarUslugi/pozycja">
                        
                            <tr><td><xsl:value-of select="wartoscNetto"/> </td></tr>
                        
                    </xsl:for-each>
                </table>
            </div>

             <div id="towarpodatek" class="colordane">
                <table>
                    <xsl:for-each select="faktura/towarUslugi/pozycja">
                        
                            <tr><td><xsl:value-of select="kwotaVAT"/> </td></tr>
                        
                    </xsl:for-each>
                </table>
            </div>

            <div id="towarWbrutto" class="colordane">
                <table>
                    <xsl:for-each select="faktura/towarUslugi/pozycja">
                        
                            <tr><td><xsl:value-of select="wartoscBrutto"/> </td></tr>
                        
                    </xsl:for-each>
                </table>
            </div>

            <div id="daneSposobPlatnosci" class="colordane">
      
                <xsl:value-of select="faktura/dane/sposobPlatnosci"/>

            </div>

            <div id="suma" class="colordane"></div>
            <div id="suma2" class="colordane"></div>
        </div>
        </div>
    <script src="lab5.js"></script>
    </body>
    </html>
</xsl:template>

</xsl:stylesheet>