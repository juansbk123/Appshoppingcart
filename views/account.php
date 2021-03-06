<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include("header.php"); ?>  
    <main>
        <div class="container">
            <div class="row">
                <div class="side-2">
                    <div class="menu-panel-usuario__seccion-cuenta"><div class="menu-panel-usuario__encabezado"><strong>MI CUENTA</strong></div><ul class="menu-panel-usuario__listado"><li><a href="account.php" class="menu-panel-usuario__datos"><span class="pull-xs-left">Mis datos</span><span class="clearfix"></span></a></li><li><a href="orders.php" class="menu-panel-usuario__cestas"><span class="pull-xs-left">Mis pedidos</span><span class="pull-xs-right"></span><span class="clearfix"></span></a></li></ul></div>
                </div>
                <div class="main-2">
                    <div class="encabezado-2">
                        <h2>Mis Datos</h2>
                    </div>
                    <div class="main-section">
                        <div class="section-1">
                            <form action="">
                                <h3>Datos de Cuenta</h3>
                                <div class="data-row">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="data-row">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <div class="date">
                                            <select name="dob-day" id="dob-day" class="form-control">
                                                <option value="">Dia</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <select name="dob-month" id="dob-month" class="form-control">
                                                <option value="">Mes</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <select name="dob-year" id="dob-year" class="form-control">
                                                <option value="">Año</option>
                                                <option value="2012">2021</option>
                                                <option value="2012">2020</option>
                                                <option value="2012">2019</option>
                                                <option value="2012">2018</option>
                                                <option value="2012">2017</option>
                                                <option value="2012">2016</option>
                                                <option value="2012">2015</option>
                                                <option value="2012">2014</option>
                                                <option value="2012">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>
                                                <option value="2009">2009</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                                <option value="1945">1945</option>
                                                <option value="1944">1944</option>
                                                <option value="1943">1943</option>
                                                <option value="1942">1942</option>
                                                <option value="1941">1941</option>
                                                <option value="1940">1940</option>
                                                <option value="1939">1939</option>
                                                <option value="1938">1938</option>
                                                <option value="1937">1937</option>
                                                <option value="1936">1936</option>
                                                <option value="1935">1935</option>
                                                <option value="1934">1934</option>
                                                <option value="1933">1933</option>
                                                <option value="1932">1932</option>
                                                <option value="1931">1931</option>
                                                <option value="1930">1930</option>
                                                <option value="1929">1929</option>
                                                <option value="1928">1928</option>
                                                <option value="1927">1927</option>
                                                <option value="1926">1926</option>
                                                <option value="1925">1925</option>
                                                <option value="1924">1924</option>
                                                <option value="1923">1923</option>
                                                <option value="1922">1922</option>
                                                <option value="1921">1921</option>
                                                <option value="1920">1920</option>
                                                <option value="1919">1919</option>
                                                <option value="1918">1918</option>
                                                <option value="1917">1917</option>
                                                <option value="1916">1916</option>
                                                <option value="1915">1915</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">E-mail</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <input type="submit" value="Guardar cambios" class="btn btn-submit">
                                </div>
                            </form>
                        </div>
                        <div class="section-2">
                            <form action="">
                                <h3>Contraseña</h3>
                                <div class="data-row">
                                    <div class="form-group">
                                        <label for="">Antigua Contraseña</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nueva Contraseña</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Repetir Contraseña</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <input type="submit" value="Guardar cambios" class="btn btn-submit">
                                </div>
                            </form>
                        </div>
                        <!-- <div class="section-3">
                            <h3>Direccion de envio</h3>
                            <div class="data-row">
                                <input type="button" value="">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>