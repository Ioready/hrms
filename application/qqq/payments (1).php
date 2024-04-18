<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>Payments</h1>
        <span class="tbltoprgt_btn"><a data-toggle="modal"data-target="#paymentModal" class="btn btn-flat btn-sm btn-success margn-right-btn">Add Payment</a></span>   

    </section>

    <div class="innercontentdiv whitebg">
                    <div class="alldata_tbl">
                        <div id="all_tbl_container1">
                            <div class="table-responsive"> 
                                <table id="client_tbl" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Invoices</th>
                                        <th>Payment Date</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($getAllPayment) && !empty($getAllPayment)){ 
                                              foreach($getAllPayment as $key=>$value){
                                        ?>
                                        <tr>
                                          <td><?php echo $value['invoice']; ?></td>
                                          <td><?php echo $value['payment date']; ?></td>
                                          <td><?php echo $value['amount']; ?></td>
                                          <td><?php echo $value['payment method']; ?></td>
                                          <td><?php echo $value['notes']; ?></td>
										
                                          <td>
                                            <a data-toggle="modal" data-target="#updateCategoryModal" onclick="setUpdateCategoryId('<?php echo $value['id'];?>','<?php echo $value['name'];?>');"><i class="fa fa-pencil" data-toggle="tooltip"  data-original-title="Edit Category"></i></a> | 

                                            <a data-toggle="modal" data-target="#deleteClientModal" onclick="setdeleteCategoryId('<?php echo $value['id']; ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-original-title="Delete Category" data-placement="left" title=""></i></a>
                                          </td>
                                        </tr>
                                      <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>   
                </div>             
            
    
    <!-- /.content -->
</div>

<div class="modal fade issuerpopup" id="deleteClientModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User</h4>
            </div>
            <!-- Wait Alert -->
            <div id='deleteClientwait_msg' class="alert alert-warning no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
            </div>
            <!-- Error Alert -->
            <div id='deleteClienterror_msg' class="alert alert-danger no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Sorry! </b></span><span id="deleteClienterror_content"></span>
            </div>
            <!-- Success Alert -->
            <div id='deleteClientsuccess_msg' class="alert alert-success no-border" style="display: none;">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"><b>Success! </b></span><span id="deleteClientsuccess_content"></span>
            </div>
            <form class="form-horizontal" method="post" name="deleteClient" id="deleteClient">
                <div class="modal-body">
                    <div class="popupcontentdiv">
                        <h4 class="text-center">Deleting this user will delete all the details.<br><br>Are you sure?<br><br></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2"></div>
                                <input type="hidden" name="clientId" id="clientId" />
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-flat btn-green">Submit</button>
                        <div class="btn btn-default btn-flat" data-dismiss="modal">Close</div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>



<!-- Status -->

<div id="paymentModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add Payment</h2>
            </div>
            
            <div class="modal-body scroll-y">
            <div id='addClientwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='addClienterror_msg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addClienterror_content"></span>
                </div>
                <div id='addClientsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="addClientsuccess_content"></span>
                </div>
                <form name="paymentForm" id="paymentForm" method="post">
                <div class="row">
                
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="invoice" class="form-label required mb-3">Invoice:</label>
                        <select id="invoice_id" class="form-select  invoice " required data-control="select2" name="invoice_id">
                            <option selected="selected" value="">Invoice</option><option value="3596">B01001</option><option value="3595">LYONXX</option><option value="3586">CSJILC</option><option value="3584">EZGQSA</option><option value="3583">4CHFUM</option><option value="3580">NVWCKA</option><option value="3578">12345</option><option value="3568">QL7ZRO</option><option value="3560">NXJJTW</option><option value="3554">6GTS0B</option><option value="3553">HGFVRD</option><option value="3552">6QEMKV</option><option value="3546">GARKR2</option><option value="3544">8BM8WJ</option><option value="3539">OXG3NQ</option><option value="3516">5KYYFV</option><option value="3513">HYIW9L</option><option value="3507">5UZJXR</option><option value="3505">GGOSSO</option><option value="3474">GU3S6I</option><option value="3471">FXNLQE</option><option value="3469">X0E7CR</option><option value="3452">YQIMKP</option><option value="3409">QBRONK</option><option value="3404">6D4U7K</option><option value="3395">IHWWAX</option><option value="3379">UJYZY5</option><option value="3375">A4LG2Q</option><option value="3362">RZAKO7</option><option value="3352">5HGPNR</option><option value="3349">KAZARV</option><option value="3346">MZYDJ6</option><option value="3332">QOX6YD</option><option value="3331">LESCWZ</option><option value="3321">XEDCM1</option><option value="3305">GECT7D</option><option value="3303">BCHFGF</option><option value="3300">2QXWLL</option><option value="3293">74V9AW</option><option value="3159">LZLWI9</option><option value="3153">QA6Z37</option><option value="3149">TAOMZS</option><option value="3148">18AQMH</option><option value="3146">PBKQB8</option><option value="3138">9XTNEJ</option><option value="3126">Z1IBSJ</option><option value="3124">2S5QCM</option><option value="3113">TX9JVN</option><option value="3112">I8JZHA</option><option value="3110">ZVE4CC</option><option value="3055">TI6ZSJ</option><option value="3054">9LC6FX</option><option value="3051">DDASD</option><option value="3050">TBHEKN</option><option value="3047">DXIDTQ</option><option value="3042">MBPTJL</option><option value="3037">DDGSF7</option><option value="3025">CKGVZ5</option><option value="2987">S7DYHU</option><option value="2961">V7HYWE</option><option value="2861">8FYZ83</option><option value="2814">FMC2TV</option><option value="2773">LKFNLG</option><option value="2733">6APN9U</option><option value="2704">GIXTZV</option><option value="2703">BS3IIO</option><option value="2702">XWRPLC</option><option value="2651">60E7QJ</option><option value="2649">ESKEID</option><option value="2591">DNSTN8</option><option value="2550">2XHBBW</option><option value="2504">RO9N8N</option><option value="2497">ZDYN7X</option><option value="2496">RQQIFH</option><option value="2494">GXS2W7</option><option value="2470">WRGA9S</option><option value="2469">IEMB9L</option><option value="2465">W9G5UH</option><option value="2464">UW3PKI</option><option value="2463">IXWBG6</option><option value="2462">M0EUEX</option><option value="2461">R5TIHU</option><option value="2460">CAN129</option><option value="2454">1JQ6D7</option><option value="2452">CJPOS9</option><option value="2451">CRS8KI</option><option value="2447">A00FQZ</option><option value="2443">NHE9OZ</option><option value="2407">CA6XGR</option><option value="2403">MA5ZBN</option><option value="2402">YLWWZV</option><option value="2398">0QEYCA</option><option value="2394">PEDYHR</option><option value="2393">LPAA9Z</option><option value="2389">H1JZCB</option><option value="2353">KZBDY9</option><option value="2322">3F5L0N</option><option value="2294">87NUZH</option><option value="2292">FRLWQ2</option><option value="2274">LFFEL3</option><option value="2273">SPNWWF</option><option value="2271">ABU5HF</option><option value="2269">0FINGC</option><option value="2264">CAR</option><option value="2258">TRZ2ZB</option><option value="2236">Q7GJOM</option><option value="2231">IUQ5OE</option><option value="2229">PQN01Z</option><option value="2223">QZE8OI</option><option value="2222">QAMPSX</option><option value="2214">GOZCHF</option><option value="2205">LZJ0RD</option><option value="2204">F5FNFD</option><option value="2198">KUTQBO</option><option value="2194">JW9CA2</option><option value="2188">PRB02U</option><option value="2187">M53WFT</option><option value="2181">8N20GY</option><option value="2179">OBISD6</option><option value="2176">LFFNNX</option><option value="2175">DJP59J</option><option value="2171">Z6BUJX</option><option value="2170">DJUDIM</option><option value="2166">JCUCRZ</option><option value="2164">KGKA4C</option><option value="2163">WCXYJU</option><option value="2159">TWUNAO</option><option value="2157">C4IVHM</option><option value="2154">IKHI</option><option value="2148">DJJHDM</option><option value="2147">NGEHAQ</option><option value="2142">DF381E</option><option value="2140">P0PAXC</option><option value="2139">OIZAKW</option><option value="2105">3B5F9R</option><option value="2100">P4270Y</option><option value="2097">SLKIUX</option><option value="2095">HYYZYV</option><option value="2093">OHDXOF</option><option value="2089">EZKKFQ</option><option value="2088">EHFCFD</option><option value="2087">XTEC4L</option><option value="2085">LQJA5X</option><option value="2083">AHAGNK</option><option value="2081">TFFGCJ</option><option value="2080">BRX4FX</option><option value="2069">F6P2IA</option><option value="2068">MJSAD5</option><option value="2063">XQAV7G</option><option value="2057">OFWWUV</option><option value="2051">PD1TC0</option><option value="2045">MLGFG2</option><option value="2044">CMTRCF</option><option value="2043">ALMLEK</option><option value="2030">7HT7C2</option><option value="2028">M8WSHE</option><option value="2023">7AHK0X</option><option value="2017">A35CPY</option><option value="2016">JMLZQ2</option><option value="2013">WU1ZMK</option><option value="2009">SO9FO3</option><option value="2007">WBPCWO</option><option value="2004">LLOSXI</option><option value="2003">NHLPW8</option><option value="2000">1QF9L2</option><option value="1999">P6TEPD</option><option value="1997">A94ZK7</option><option value="1994">OR8S1K</option><option value="1992">Z4TPHO</option><option value="1989">GFVRRT</option><option value="1978">X1TI6Z</option><option value="1977">X8EQ1W</option><option value="1976">OCFYKW</option><option value="1970">I9MBGX</option><option value="1954">PHVT62</option><option value="1953">FFIIC3</option><option value="1952">516516</option><option value="1947">RTHAJ5</option><option value="1945">0125</option><option value="1942">0AO4HL</option><option value="1941">HXHNJX</option><option value="1936">7YXATB</option><option value="1932">S5ROHL</option><option value="1923">TPDPIS</option><option value="1921">I8IKIL</option><option value="1918">ZL0MKA</option><option value="1913">3KQVXO</option><option value="1910">JAXVQA</option><option value="1908">X3DHGC</option><option value="1904">RZLCAZ</option><option value="1903">QVRV94</option><option value="1893">GIIVI5</option><option value="1892">QXAEWX</option><option value="1887">IQVUOP</option><option value="1885">HHKUKB</option><option value="1875">PU9555</option><option value="1867">BKG5NP</option><option value="1864">XC7TZZ</option><option value="1863">Z3ZR1A</option><option value="1860">TVNMXL</option><option value="1857">OA5ABB</option><option value="1856">ZWK5PN</option><option value="1854">RWJLUJ</option><option value="1848">IAZSW2</option><option value="1845">ZZJVYC</option><option value="1844">84CQGL</option><option value="1837">F3WGG4</option><option value="1836">UTNQPC</option><option value="1835">NO6PA0</option><option value="1829">A1BZ1B</option><option value="1822">EW6UPN</option><option value="1821">PDDQB1</option><option value="1816">3EDGCB</option><option value="1815">TQ5555</option><option value="1811">KIDEJH</option><option value="1806">DUMBRX</option><option value="1801">9XJ25J</option><option value="1799">PPAQWE</option><option value="1798">5AW34N</option><option value="1797">HKXK6J</option><option value="1792">JNYXRE</option><option value="1790">K8DCST</option><option value="1788">VPFNSU</option><option value="1782">NWAXB3</option><option value="1779">ZWSULT</option><option value="1776">Y8V9O1</option><option value="1775">FJPA0A</option><option value="1774">OBUANI</option><option value="1767">KDESYZ</option><option value="1766">MPCJGN</option><option value="1765">HWCQKA</option><option value="1757">AOMEUB</option><option value="1755">AHXB3U</option><option value="1747">K6VZUX</option><option value="1732">LSTXVO</option><option value="1726">I2KFKW</option><option value="1719">XFORO2</option><option value="1714">ETRYUK</option><option value="1712">2RKNJP</option><option value="1699">S19MA0</option><option value="1695">Q4VSAX</option><option value="1690">WKJQ1F</option><option value="1685">0DCOS0</option><option value="1683">ENYYBG</option><option value="1681">0OFXH6</option><option value="1678">OD1VJN</option><option value="1675">WDVSYE</option><option value="1673">GFAMY1</option><option value="1672">6LGRXE</option><option value="1670">P7872H</option><option value="1669">QSCEA0</option><option value="1664">RK7Y2Z</option><option value="1660">6UMXKN</option><option value="1653">4G0VER</option><option value="1640">YVSEC8</option><option value="1639">2JQNBX</option><option value="1638">6MUPAQ</option><option value="1633">2NP4MB</option><option value="1627">XBQPNK</option><option value="1621">IHRENA</option><option value="1617">K628LF</option><option value="1615">SPY7CK</option><option value="1607">FOG6UZ</option><option value="1606">3SHYY9</option><option value="1599">OWFOJP</option><option value="1598">D9OMFG</option><option value="1593">J1IQT1</option><option value="1591">7R2RMM</option><option value="1588">CIJVHE</option><option value="1585">AHSZ00</option><option value="1582">TZQIJR</option><option value="1580">XRPTRQ</option><option value="1578">XRRK0L</option><option value="1573">WIVU2M</option><option value="1571">NTM2XE</option><option value="1569">A3IQDF</option><option value="1567">8EA7KI</option><option value="1558">I3NDUU</option><option value="1554">ZIYXU0</option><option value="1553">UZBNTM</option><option value="1550">IYFQSH</option><option value="1547">JGDK7S</option><option value="1544">QKSM7I</option><option value="1543">DJFQFA</option><option value="1540">U2LNX2</option><option value="1539">PGW4WZ</option><option value="1530">IR5IJJ</option><option value="1525">MTF7MG</option><option value="1522">JTXVBB</option><option value="1521">FNXOWA</option><option value="1518">7RLUSM</option><option value="1517">KZQZA8</option><option value="1509">DXKKXJ</option><option value="1382">QDDEHD</option><option value="1376">NQRMOP</option><option value="1375">IH8MMX</option><option value="1362">ZZ9X71</option><option value="1361">SFE9HA</option><option value="1354">H4PHUN</option><option value="1353">FTVSIE</option><option value="1352">UDFLNW</option><option value="1345">QRZS4Z</option><option value="1344">VJ4BQP</option><option value="1343">UXQEP3</option><option value="1342">J0XVCI</option><option value="1341">TAPS6L</option><option value="1339">L1DZES</option><option value="1318">K6W20M</option><option value="1316">QRCTWT</option><option value="1313">SQVB0E</option><option value="1312">LESVBR</option><option value="1308">E4QT9K</option><option value="1304">VAFUM8</option><option value="1300">IMVWQZ</option><option value="1299">1NW4VP</option><option value="1298">X2JHXH</option><option value="1291">KGTVI6</option><option value="1290">SROT8K</option><option value="1289">DBSPZ8</option><option value="1288">FHM6PK</option><option value="1287">JJEPGW</option><option value="1286">R0DTCM</option><option value="1283">ZZZZZZ</option><option value="1278">C6XR5Y</option><option value="1270">A5MD7F</option><option value="1267">JXYE9R</option><option value="1266">VJ55CR</option><option value="1264">FQ9Y7M</option><option value="1262">OFHQSB</option><option value="1256">HGM7BB</option><option value="1255">KL9SIM</option><option value="1254">HSFCJW</option><option value="1253">U1DSJY</option><option value="1252">IPWVY0</option><option value="1251">LAEBEP</option><option value="1239">1A1UZT</option><option value="1237">MVYZ6V</option><option value="1235">KC3YWL</option><option value="1234">BJYAKY</option><option value="1227">A76YUI</option><option value="1216">5VDMKI</option><option value="1215">QY3VV2</option><option value="1209">BVDVIB</option><option value="1207">57VFPC</option><option value="1202">NDWWUI</option><option value="1200">MEPIDS</option><option value="1195">TDRVAV</option><option value="1194">I5ZBHV</option><option value="1193">59T7DN</option><option value="1191">L5XULK</option><option value="1180">XBOMQF</option><option value="1178">RT2UWX</option><option value="1177">JEYANG</option><option value="1163">HVLW7O</option><option value="1157">J7CAZ8</option><option value="1156">ODLZ2T</option><option value="1155">XAVSFK</option><option value="1153">H6NK7V</option><option value="1152">MOLF9I</option><option value="1151">ODR0KP</option><option value="1150">OTQQ8K</option><option value="1149">TQF4XA</option><option value="1145">WSIGS7</option><option value="1142">FXO9HS</option><option value="1141">P59Q3N</option><option value="1135">OUQO5I</option><option value="1133">JJ5QNO</option><option value="1132">BFS57X</option><option value="1129">Q3QWVC</option><option value="1127">YXOASY</option><option value="1125">XTQ71T</option><option value="1122">UIDC7C</option><option value="1120">Z7B10F</option><option value="1119">5O2ANB</option><option value="1116">EDSJOZ</option><option value="1115">5L0JQW</option><option value="1114">BJHFQF</option><option value="1112">SI8J4G</option><option value="1109">DPW7IO</option><option value="1108">SQEVER</option><option value="1107">FJMUUO</option><option value="1106">JFDI3C</option><option value="1101">C8JLBN</option><option value="1099">UNNBN3</option><option value="1098">QJNUGF</option><option value="1094">TLU03Z</option><option value="1089">WHTRPI</option><option value="1088">IXV0J0</option><option value="1086">2OOJCL</option><option value="1084">WIOL1I</option><option value="1083">DVDAJA</option><option value="1081">M1XRCB</option><option value="1080">FOOSS8</option><option value="1064">RI9IYR</option><option value="1063">7RFMNP</option><option value="1062">FQC2UV</option><option value="1058">CKX2V5</option><option value="1054">4FWPCE</option><option value="1052">C8G8GG</option><option value="1044">IRKQ8Y</option><option value="1042">SWJZL0</option><option value="1041">AHOBCH</option><option value="1039">E4DLWV</option><option value="1033">EW0ZUR</option><option value="1031">AOEJT8</option><option value="1028">YDCDIA</option><option value="1026">GPKTJU</option><option value="1024">S0WLNO</option><option value="1022">GOIYJW</option><option value="1019">8KZRPF</option><option value="1014">2S0MIH</option><option value="1009">OBJ0GA</option><option value="1005">X4VQPM</option><option value="1002">BTHUPZ</option><option value="1001">2QQMCW</option><option value="999">OBTGP4</option><option value="998">JZGAVT</option><option value="995">4JUVMX</option><option value="993">ZCCEZT</option><option value="992">ETMASQ</option><option value="991">OL2591</option><option value="990">LUIU4Y</option><option value="984">NAXWF4</option><option value="978">IYZP4N</option><option value="976">59KMAQ</option><option value="967">SL3C8C</option><option value="960">IDW9AR</option><option value="957">W6SR67</option><option value="953">QZHDOM</option><option value="949">54815F</option><option value="942">RX8GNK</option><option value="939">QOYIKD</option><option value="937">228E80</option><option value="928">LCSRRA</option><option value="922">PTOTB5</option><option value="917">EZ9N3W</option><option value="908">ZDKMHD</option><option value="903">UTA8LN</option><option value="861">BCFMIR</option><option value="809">EUNOLK</option><option value="803">5UJ41Q</option><option value="794">CK5SQD</option><option value="791">V9DXOX</option><option value="782">MRZYZL</option><option value="779">MYIHEE</option><option value="776">0JNPXU</option><option value="771">OW9QLP</option><option value="767">DI3XNO</option><option value="766">TWIPVK</option><option value="764">YRHB3A</option><option value="741">CBQRMO</option><option value="734">EONX6W</option><option value="730">QNCPBX</option><option value="714">RB9JWZ</option><option value="697">ISVYVU</option><option value="695">YC16EM</option><option value="683">2JCOVG</option><option value="681">IWEQ60</option><option value="664">N5FOKL</option><option value="650">GLF002</option><option value="646">UDVP6V</option><option value="643">KD9ISV</option><option value="635">CELEE8</option><option value="631">ZSU8IV</option><option value="627">GQ3ZNW</option><option value="613">0RIMKV</option><option value="612">G5UKTY</option><option value="610">POOLXX</option><option value="609">LJH02Y</option><option value="605">1</option><option value="604">JSS7PL</option><option value="603">JVZYZL</option><option value="574">56DUGL</option><option value="573">LLBP8P</option><option value="554">VMANLW</option><option value="550">VUAKDW</option><option value="549">JWBRK5</option><option value="548">0001</option><option value="547">W9G42C</option><option value="545">1GIFZC</option><option value="538">X5JPI1</option><option value="536">MLKQJK</option><option value="535">8E3CZN</option><option value="534">52CV4C</option><option value="531">UXWYYI</option><option value="528">9A02ZU</option><option value="526">GSNJ2Q</option><option value="522">GHYFF8</option><option value="518">PFV9WT</option><option value="510">FPADVM</option><option value="504">GOEQQO</option><option value="501">YC3PQ7</option><option value="498">GSLSPO</option><option value="493">VL697Z</option><option value="486">T2IPHZ</option><option value="484">VIQKBH</option><option value="482">C5PJN0</option><option value="481">1J1R9M</option><option value="479">NKNVZI</option><option value="475">BGCM7M</option><option value="474">A7BKMX</option><option value="463">ULVYHJ</option><option value="454">EUI3A6</option><option value="453">ZTJXAA</option><option value="452">PBZYJJ</option><option value="449">D3BBKZ</option><option value="448">3YRXPM</option><option value="446">OJCAWB</option><option value="445">B7XIDW</option><option value="444">YTRMSO</option><option value="443">TT2VJO</option><option value="440">3V4WU0</option><option value="433">V7VZ0F</option><option value="423">BYWFLB</option><option value="412">QVAHFN</option><option value="407">B9QE11</option><option value="404">NFOB06</option><option value="400">Z8HW6P</option><option value="390">BSV624</option><option value="389">JUM8EV</option><option value="388">DXJLI2</option><option value="384">123321</option><option value="381">5R2PYF</option><option value="378">EP7NIS</option><option value="377">39C1IZ</option><option value="375">TBAO2E</option><option value="374">WFDWBY</option><option value="372">EKZMCB</option><option value="365">DXN3ZA</option><option value="361">GEFXYX</option><option value="360">YNISI3</option></select>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="due_amount" class="form-label mb-3">Due Amount:</label>
                        <div class="input-group">
                            <input id="due_amount" class="form-control " placeholder="Due Amount" readonly disabled name="due_amount" type="text">
                        </div>
                        <div class="input-group">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Currency Code">€</a>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="paid_amount" class="form-label mb-3">Paid Amount:</label>
                        <div class="input-group">
                            <input id="paid_amount" class="form-control " placeholder="Paid Amount" readonly disabled name="paid_amount" type="text">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                €
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="payment_date" class="form-label required mb-3">Payment Date:</label>
                        <input class="form-control  " id="payment_date" autocomplete="off" required data-focus="false" name="payment_date" type="text">
                        
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="amount" class="form-label required mb-3">Amount:</label>
                        <div class="input-group">
                            <input id="amount" class="form-control  amount d-flex" step="any" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,&#039;&#039;))" min="0" pattern="^\d*(\.\d{0,2})?$" required placeholder="Amount" name="amount" type="number">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                €
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="payment_mode" class="form-label required mb-3">Payment Method:</label>
                        <input id="adminPaymentMode" readonly class="form-control  " name="payment_mode" type="text" value="Cash">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="notes" class="form-label required mb-3">Note:</label>
                        <textarea id="payment_note" class="form-control " rows="5" required name="notes" cols="50"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnPay" data-loading-text="&lt;span class=&#039;spinner-border spinner-border-sm&#039;&gt;&lt;/span&gt; Processing..." data-new-text="Pay">Pay</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3"
                        data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->

<div id="updatepaymentModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Update Payment</h2>
            </div>
            
            <div class="modal-body scroll-y">
            <div id='addClientwait_msg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='addClienterror_msg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="addClienterror_content"></span>
                </div>
                <div id='addClientsuccess_msg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="addClientsuccess_content"></span>
                </div>
                <form name="paymentForm" id="paymentForm" method="post">
                <div class="row">
                
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="invoice" class="form-label required mb-3">Invoice:</label>
                        <select id="invoice_id" class="form-select  invoice " required data-control="select2" name="invoice_id">
                            <option selected="selected" value="">Invoice</option><option value="3596">B01001</option><option value="3595">LYONXX</option><option value="3586">CSJILC</option><option value="3584">EZGQSA</option><option value="3583">4CHFUM</option><option value="3580">NVWCKA</option><option value="3578">12345</option><option value="3568">QL7ZRO</option><option value="3560">NXJJTW</option><option value="3554">6GTS0B</option><option value="3553">HGFVRD</option><option value="3552">6QEMKV</option><option value="3546">GARKR2</option><option value="3544">8BM8WJ</option><option value="3539">OXG3NQ</option><option value="3516">5KYYFV</option><option value="3513">HYIW9L</option><option value="3507">5UZJXR</option><option value="3505">GGOSSO</option><option value="3474">GU3S6I</option><option value="3471">FXNLQE</option><option value="3469">X0E7CR</option><option value="3452">YQIMKP</option><option value="3409">QBRONK</option><option value="3404">6D4U7K</option><option value="3395">IHWWAX</option><option value="3379">UJYZY5</option><option value="3375">A4LG2Q</option><option value="3362">RZAKO7</option><option value="3352">5HGPNR</option><option value="3349">KAZARV</option><option value="3346">MZYDJ6</option><option value="3332">QOX6YD</option><option value="3331">LESCWZ</option><option value="3321">XEDCM1</option><option value="3305">GECT7D</option><option value="3303">BCHFGF</option><option value="3300">2QXWLL</option><option value="3293">74V9AW</option><option value="3159">LZLWI9</option><option value="3153">QA6Z37</option><option value="3149">TAOMZS</option><option value="3148">18AQMH</option><option value="3146">PBKQB8</option><option value="3138">9XTNEJ</option><option value="3126">Z1IBSJ</option><option value="3124">2S5QCM</option><option value="3113">TX9JVN</option><option value="3112">I8JZHA</option><option value="3110">ZVE4CC</option><option value="3055">TI6ZSJ</option><option value="3054">9LC6FX</option><option value="3051">DDASD</option><option value="3050">TBHEKN</option><option value="3047">DXIDTQ</option><option value="3042">MBPTJL</option><option value="3037">DDGSF7</option><option value="3025">CKGVZ5</option><option value="2987">S7DYHU</option><option value="2961">V7HYWE</option><option value="2861">8FYZ83</option><option value="2814">FMC2TV</option><option value="2773">LKFNLG</option><option value="2733">6APN9U</option><option value="2704">GIXTZV</option><option value="2703">BS3IIO</option><option value="2702">XWRPLC</option><option value="2651">60E7QJ</option><option value="2649">ESKEID</option><option value="2591">DNSTN8</option><option value="2550">2XHBBW</option><option value="2504">RO9N8N</option><option value="2497">ZDYN7X</option><option value="2496">RQQIFH</option><option value="2494">GXS2W7</option><option value="2470">WRGA9S</option><option value="2469">IEMB9L</option><option value="2465">W9G5UH</option><option value="2464">UW3PKI</option><option value="2463">IXWBG6</option><option value="2462">M0EUEX</option><option value="2461">R5TIHU</option><option value="2460">CAN129</option><option value="2454">1JQ6D7</option><option value="2452">CJPOS9</option><option value="2451">CRS8KI</option><option value="2447">A00FQZ</option><option value="2443">NHE9OZ</option><option value="2407">CA6XGR</option><option value="2403">MA5ZBN</option><option value="2402">YLWWZV</option><option value="2398">0QEYCA</option><option value="2394">PEDYHR</option><option value="2393">LPAA9Z</option><option value="2389">H1JZCB</option><option value="2353">KZBDY9</option><option value="2322">3F5L0N</option><option value="2294">87NUZH</option><option value="2292">FRLWQ2</option><option value="2274">LFFEL3</option><option value="2273">SPNWWF</option><option value="2271">ABU5HF</option><option value="2269">0FINGC</option><option value="2264">CAR</option><option value="2258">TRZ2ZB</option><option value="2236">Q7GJOM</option><option value="2231">IUQ5OE</option><option value="2229">PQN01Z</option><option value="2223">QZE8OI</option><option value="2222">QAMPSX</option><option value="2214">GOZCHF</option><option value="2205">LZJ0RD</option><option value="2204">F5FNFD</option><option value="2198">KUTQBO</option><option value="2194">JW9CA2</option><option value="2188">PRB02U</option><option value="2187">M53WFT</option><option value="2181">8N20GY</option><option value="2179">OBISD6</option><option value="2176">LFFNNX</option><option value="2175">DJP59J</option><option value="2171">Z6BUJX</option><option value="2170">DJUDIM</option><option value="2166">JCUCRZ</option><option value="2164">KGKA4C</option><option value="2163">WCXYJU</option><option value="2159">TWUNAO</option><option value="2157">C4IVHM</option><option value="2154">IKHI</option><option value="2148">DJJHDM</option><option value="2147">NGEHAQ</option><option value="2142">DF381E</option><option value="2140">P0PAXC</option><option value="2139">OIZAKW</option><option value="2105">3B5F9R</option><option value="2100">P4270Y</option><option value="2097">SLKIUX</option><option value="2095">HYYZYV</option><option value="2093">OHDXOF</option><option value="2089">EZKKFQ</option><option value="2088">EHFCFD</option><option value="2087">XTEC4L</option><option value="2085">LQJA5X</option><option value="2083">AHAGNK</option><option value="2081">TFFGCJ</option><option value="2080">BRX4FX</option><option value="2069">F6P2IA</option><option value="2068">MJSAD5</option><option value="2063">XQAV7G</option><option value="2057">OFWWUV</option><option value="2051">PD1TC0</option><option value="2045">MLGFG2</option><option value="2044">CMTRCF</option><option value="2043">ALMLEK</option><option value="2030">7HT7C2</option><option value="2028">M8WSHE</option><option value="2023">7AHK0X</option><option value="2017">A35CPY</option><option value="2016">JMLZQ2</option><option value="2013">WU1ZMK</option><option value="2009">SO9FO3</option><option value="2007">WBPCWO</option><option value="2004">LLOSXI</option><option value="2003">NHLPW8</option><option value="2000">1QF9L2</option><option value="1999">P6TEPD</option><option value="1997">A94ZK7</option><option value="1994">OR8S1K</option><option value="1992">Z4TPHO</option><option value="1989">GFVRRT</option><option value="1978">X1TI6Z</option><option value="1977">X8EQ1W</option><option value="1976">OCFYKW</option><option value="1970">I9MBGX</option><option value="1954">PHVT62</option><option value="1953">FFIIC3</option><option value="1952">516516</option><option value="1947">RTHAJ5</option><option value="1945">0125</option><option value="1942">0AO4HL</option><option value="1941">HXHNJX</option><option value="1936">7YXATB</option><option value="1932">S5ROHL</option><option value="1923">TPDPIS</option><option value="1921">I8IKIL</option><option value="1918">ZL0MKA</option><option value="1913">3KQVXO</option><option value="1910">JAXVQA</option><option value="1908">X3DHGC</option><option value="1904">RZLCAZ</option><option value="1903">QVRV94</option><option value="1893">GIIVI5</option><option value="1892">QXAEWX</option><option value="1887">IQVUOP</option><option value="1885">HHKUKB</option><option value="1875">PU9555</option><option value="1867">BKG5NP</option><option value="1864">XC7TZZ</option><option value="1863">Z3ZR1A</option><option value="1860">TVNMXL</option><option value="1857">OA5ABB</option><option value="1856">ZWK5PN</option><option value="1854">RWJLUJ</option><option value="1848">IAZSW2</option><option value="1845">ZZJVYC</option><option value="1844">84CQGL</option><option value="1837">F3WGG4</option><option value="1836">UTNQPC</option><option value="1835">NO6PA0</option><option value="1829">A1BZ1B</option><option value="1822">EW6UPN</option><option value="1821">PDDQB1</option><option value="1816">3EDGCB</option><option value="1815">TQ5555</option><option value="1811">KIDEJH</option><option value="1806">DUMBRX</option><option value="1801">9XJ25J</option><option value="1799">PPAQWE</option><option value="1798">5AW34N</option><option value="1797">HKXK6J</option><option value="1792">JNYXRE</option><option value="1790">K8DCST</option><option value="1788">VPFNSU</option><option value="1782">NWAXB3</option><option value="1779">ZWSULT</option><option value="1776">Y8V9O1</option><option value="1775">FJPA0A</option><option value="1774">OBUANI</option><option value="1767">KDESYZ</option><option value="1766">MPCJGN</option><option value="1765">HWCQKA</option><option value="1757">AOMEUB</option><option value="1755">AHXB3U</option><option value="1747">K6VZUX</option><option value="1732">LSTXVO</option><option value="1726">I2KFKW</option><option value="1719">XFORO2</option><option value="1714">ETRYUK</option><option value="1712">2RKNJP</option><option value="1699">S19MA0</option><option value="1695">Q4VSAX</option><option value="1690">WKJQ1F</option><option value="1685">0DCOS0</option><option value="1683">ENYYBG</option><option value="1681">0OFXH6</option><option value="1678">OD1VJN</option><option value="1675">WDVSYE</option><option value="1673">GFAMY1</option><option value="1672">6LGRXE</option><option value="1670">P7872H</option><option value="1669">QSCEA0</option><option value="1664">RK7Y2Z</option><option value="1660">6UMXKN</option><option value="1653">4G0VER</option><option value="1640">YVSEC8</option><option value="1639">2JQNBX</option><option value="1638">6MUPAQ</option><option value="1633">2NP4MB</option><option value="1627">XBQPNK</option><option value="1621">IHRENA</option><option value="1617">K628LF</option><option value="1615">SPY7CK</option><option value="1607">FOG6UZ</option><option value="1606">3SHYY9</option><option value="1599">OWFOJP</option><option value="1598">D9OMFG</option><option value="1593">J1IQT1</option><option value="1591">7R2RMM</option><option value="1588">CIJVHE</option><option value="1585">AHSZ00</option><option value="1582">TZQIJR</option><option value="1580">XRPTRQ</option><option value="1578">XRRK0L</option><option value="1573">WIVU2M</option><option value="1571">NTM2XE</option><option value="1569">A3IQDF</option><option value="1567">8EA7KI</option><option value="1558">I3NDUU</option><option value="1554">ZIYXU0</option><option value="1553">UZBNTM</option><option value="1550">IYFQSH</option><option value="1547">JGDK7S</option><option value="1544">QKSM7I</option><option value="1543">DJFQFA</option><option value="1540">U2LNX2</option><option value="1539">PGW4WZ</option><option value="1530">IR5IJJ</option><option value="1525">MTF7MG</option><option value="1522">JTXVBB</option><option value="1521">FNXOWA</option><option value="1518">7RLUSM</option><option value="1517">KZQZA8</option><option value="1509">DXKKXJ</option><option value="1382">QDDEHD</option><option value="1376">NQRMOP</option><option value="1375">IH8MMX</option><option value="1362">ZZ9X71</option><option value="1361">SFE9HA</option><option value="1354">H4PHUN</option><option value="1353">FTVSIE</option><option value="1352">UDFLNW</option><option value="1345">QRZS4Z</option><option value="1344">VJ4BQP</option><option value="1343">UXQEP3</option><option value="1342">J0XVCI</option><option value="1341">TAPS6L</option><option value="1339">L1DZES</option><option value="1318">K6W20M</option><option value="1316">QRCTWT</option><option value="1313">SQVB0E</option><option value="1312">LESVBR</option><option value="1308">E4QT9K</option><option value="1304">VAFUM8</option><option value="1300">IMVWQZ</option><option value="1299">1NW4VP</option><option value="1298">X2JHXH</option><option value="1291">KGTVI6</option><option value="1290">SROT8K</option><option value="1289">DBSPZ8</option><option value="1288">FHM6PK</option><option value="1287">JJEPGW</option><option value="1286">R0DTCM</option><option value="1283">ZZZZZZ</option><option value="1278">C6XR5Y</option><option value="1270">A5MD7F</option><option value="1267">JXYE9R</option><option value="1266">VJ55CR</option><option value="1264">FQ9Y7M</option><option value="1262">OFHQSB</option><option value="1256">HGM7BB</option><option value="1255">KL9SIM</option><option value="1254">HSFCJW</option><option value="1253">U1DSJY</option><option value="1252">IPWVY0</option><option value="1251">LAEBEP</option><option value="1239">1A1UZT</option><option value="1237">MVYZ6V</option><option value="1235">KC3YWL</option><option value="1234">BJYAKY</option><option value="1227">A76YUI</option><option value="1216">5VDMKI</option><option value="1215">QY3VV2</option><option value="1209">BVDVIB</option><option value="1207">57VFPC</option><option value="1202">NDWWUI</option><option value="1200">MEPIDS</option><option value="1195">TDRVAV</option><option value="1194">I5ZBHV</option><option value="1193">59T7DN</option><option value="1191">L5XULK</option><option value="1180">XBOMQF</option><option value="1178">RT2UWX</option><option value="1177">JEYANG</option><option value="1163">HVLW7O</option><option value="1157">J7CAZ8</option><option value="1156">ODLZ2T</option><option value="1155">XAVSFK</option><option value="1153">H6NK7V</option><option value="1152">MOLF9I</option><option value="1151">ODR0KP</option><option value="1150">OTQQ8K</option><option value="1149">TQF4XA</option><option value="1145">WSIGS7</option><option value="1142">FXO9HS</option><option value="1141">P59Q3N</option><option value="1135">OUQO5I</option><option value="1133">JJ5QNO</option><option value="1132">BFS57X</option><option value="1129">Q3QWVC</option><option value="1127">YXOASY</option><option value="1125">XTQ71T</option><option value="1122">UIDC7C</option><option value="1120">Z7B10F</option><option value="1119">5O2ANB</option><option value="1116">EDSJOZ</option><option value="1115">5L0JQW</option><option value="1114">BJHFQF</option><option value="1112">SI8J4G</option><option value="1109">DPW7IO</option><option value="1108">SQEVER</option><option value="1107">FJMUUO</option><option value="1106">JFDI3C</option><option value="1101">C8JLBN</option><option value="1099">UNNBN3</option><option value="1098">QJNUGF</option><option value="1094">TLU03Z</option><option value="1089">WHTRPI</option><option value="1088">IXV0J0</option><option value="1086">2OOJCL</option><option value="1084">WIOL1I</option><option value="1083">DVDAJA</option><option value="1081">M1XRCB</option><option value="1080">FOOSS8</option><option value="1064">RI9IYR</option><option value="1063">7RFMNP</option><option value="1062">FQC2UV</option><option value="1058">CKX2V5</option><option value="1054">4FWPCE</option><option value="1052">C8G8GG</option><option value="1044">IRKQ8Y</option><option value="1042">SWJZL0</option><option value="1041">AHOBCH</option><option value="1039">E4DLWV</option><option value="1033">EW0ZUR</option><option value="1031">AOEJT8</option><option value="1028">YDCDIA</option><option value="1026">GPKTJU</option><option value="1024">S0WLNO</option><option value="1022">GOIYJW</option><option value="1019">8KZRPF</option><option value="1014">2S0MIH</option><option value="1009">OBJ0GA</option><option value="1005">X4VQPM</option><option value="1002">BTHUPZ</option><option value="1001">2QQMCW</option><option value="999">OBTGP4</option><option value="998">JZGAVT</option><option value="995">4JUVMX</option><option value="993">ZCCEZT</option><option value="992">ETMASQ</option><option value="991">OL2591</option><option value="990">LUIU4Y</option><option value="984">NAXWF4</option><option value="978">IYZP4N</option><option value="976">59KMAQ</option><option value="967">SL3C8C</option><option value="960">IDW9AR</option><option value="957">W6SR67</option><option value="953">QZHDOM</option><option value="949">54815F</option><option value="942">RX8GNK</option><option value="939">QOYIKD</option><option value="937">228E80</option><option value="928">LCSRRA</option><option value="922">PTOTB5</option><option value="917">EZ9N3W</option><option value="908">ZDKMHD</option><option value="903">UTA8LN</option><option value="861">BCFMIR</option><option value="809">EUNOLK</option><option value="803">5UJ41Q</option><option value="794">CK5SQD</option><option value="791">V9DXOX</option><option value="782">MRZYZL</option><option value="779">MYIHEE</option><option value="776">0JNPXU</option><option value="771">OW9QLP</option><option value="767">DI3XNO</option><option value="766">TWIPVK</option><option value="764">YRHB3A</option><option value="741">CBQRMO</option><option value="734">EONX6W</option><option value="730">QNCPBX</option><option value="714">RB9JWZ</option><option value="697">ISVYVU</option><option value="695">YC16EM</option><option value="683">2JCOVG</option><option value="681">IWEQ60</option><option value="664">N5FOKL</option><option value="650">GLF002</option><option value="646">UDVP6V</option><option value="643">KD9ISV</option><option value="635">CELEE8</option><option value="631">ZSU8IV</option><option value="627">GQ3ZNW</option><option value="613">0RIMKV</option><option value="612">G5UKTY</option><option value="610">POOLXX</option><option value="609">LJH02Y</option><option value="605">1</option><option value="604">JSS7PL</option><option value="603">JVZYZL</option><option value="574">56DUGL</option><option value="573">LLBP8P</option><option value="554">VMANLW</option><option value="550">VUAKDW</option><option value="549">JWBRK5</option><option value="548">0001</option><option value="547">W9G42C</option><option value="545">1GIFZC</option><option value="538">X5JPI1</option><option value="536">MLKQJK</option><option value="535">8E3CZN</option><option value="534">52CV4C</option><option value="531">UXWYYI</option><option value="528">9A02ZU</option><option value="526">GSNJ2Q</option><option value="522">GHYFF8</option><option value="518">PFV9WT</option><option value="510">FPADVM</option><option value="504">GOEQQO</option><option value="501">YC3PQ7</option><option value="498">GSLSPO</option><option value="493">VL697Z</option><option value="486">T2IPHZ</option><option value="484">VIQKBH</option><option value="482">C5PJN0</option><option value="481">1J1R9M</option><option value="479">NKNVZI</option><option value="475">BGCM7M</option><option value="474">A7BKMX</option><option value="463">ULVYHJ</option><option value="454">EUI3A6</option><option value="453">ZTJXAA</option><option value="452">PBZYJJ</option><option value="449">D3BBKZ</option><option value="448">3YRXPM</option><option value="446">OJCAWB</option><option value="445">B7XIDW</option><option value="444">YTRMSO</option><option value="443">TT2VJO</option><option value="440">3V4WU0</option><option value="433">V7VZ0F</option><option value="423">BYWFLB</option><option value="412">QVAHFN</option><option value="407">B9QE11</option><option value="404">NFOB06</option><option value="400">Z8HW6P</option><option value="390">BSV624</option><option value="389">JUM8EV</option><option value="388">DXJLI2</option><option value="384">123321</option><option value="381">5R2PYF</option><option value="378">EP7NIS</option><option value="377">39C1IZ</option><option value="375">TBAO2E</option><option value="374">WFDWBY</option><option value="372">EKZMCB</option><option value="365">DXN3ZA</option><option value="361">GEFXYX</option><option value="360">YNISI3</option></select>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="due_amount" class="form-label mb-3">Due Amount:</label>
                        <div class="input-group">
                            <input id="payment_due_amount" class="form-control " placeholder="Due Amount" readonly disabled name="payment_due_amount" type="text">
                        </div>
                        <div class="input-group">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Currency Code">€</a>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="paid_amount" class="form-label mb-3">Paid Amount:</label>
                        <div class="input-group">
                            <input id="payment_paid_amount" class="form-control " placeholder="Paid Amount" readonly disabled name="payment_paid_amount" type="text">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                €
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="payment_date" class="form-label required mb-3">Payment Date:</label>
                        <input class="form-control  " id="update_payment_date" autocomplete="off" required data-focus="false" name="update_payment_date" type="text">
                        
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5 ">
                        <label for="amount" class="form-label required mb-3">Amount:</label>
                        <div class="input-group">
                            <input id="payment_amount" class="form-control  amount d-flex" step="any" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,&#039;&#039;))" min="0" pattern="^\d*(\.\d{0,2})?$" required placeholder="Amount" name="payment_amount" type="number">
                            <a class="input-group-text bg-secondary border-0 text-decoration-none invoice-currency-code" id="autoCode" href="javascript:void(0)"
                               data-toggle="tooltip"
                               data-placement="right" title="Currency Code">
                                €
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12 mb-5">
                        <label for="payment_mode" class="form-label required mb-3">Payment Method:</label>
                        <input id="update_payment_mode" readonly class="form-control  " name="update_payment_mode" type="text" value="Cash">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="notes" class="form-label required mb-3">Note:</label>
                        <textarea id="update_payment_note" class="form-control " rows="5" required name="update_payment_note" cols="50"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnPay" data-loading-text="&lt;span class=&#039;spinner-border spinner-border-sm&#039;&gt;&lt;/span&gt; Processing..." data-new-text="Pay">Pay</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3"
                        data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div id="addtax" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h1 class="modal-title text-center">Add Payment</h1>
            </div>
            <div class="modal-body">
                <div id='sendingPasswordWaitMsg' class="alert alert-warning no-border" style="display: none;">
                    <span class="text-semibold"><b>Please Wait! </b>Your data is validating</span>
                </div>
                <div id='sendingPasswordErrorMsg' class="alert alert-danger no-border" style="display: none;">
                    <span class="text-semibold"><b>Sorry! </b></span><span id="sendingPasswordErrorContent"></span>
                </div>
                <div id='sendingPasswordSuccessMsg' class="alert alert-success no-border" style="display: none;">
                    <span class="text-semibold"><b>Success! </b></span><span id="sendingPasswordSuccessContent"></span>
                </div>
                <form name="addtaxform" id="addtaxform" method="post">
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <label for="name" class="form-label required mb-3">Name:</label>
                        <input id="tax_name" class="form-control form-control-solid" required="" placeholder="Name" name="tax_name" type="text">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="value" class="form-label required mb-3">Value:</label>
                        <input id="tax_value" class="form-control form-control-solid" oninput="validity.valid||(value=value.replace(/[e\+\-]/gi,''))" min="0" max="100" step=".01" required="" placeholder="Value" name="tax_value" type="number">
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label for="is_default" class="form-label mb-3">Is Default:</label>
                        <div class="form-check form-check-custom ">
                            <div class="btn-group">
                                <input id="is_default_yes" class="form-check-input me-2" type="radio" name="is_default" value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                                <input id="is_default_no" class="form-check-input mx-2" type="radio" name="is_default" value="0" checked="">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0">
                <button type="submit" class="btn btn-primary me-2" id="btnSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Save</button>
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3" data-bs-dismiss="modal">Cancel</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#paymentForm").submit(function(e) {
        e.preventDefault();
        window.scrollTo(0, 0);
        $('#addClientwait_msg').slideDown(1000);
        var data = $(this).serialize();
                    $.ajax({
                        url: baseURL + "Payments/addPayment",
                        type: "POST",
                        data: data,
                        success: function(result) {
                            if(result==0) {
                                $('#addClientsuccess_content').html('Category saved successfully');
                                $('#addClientsuccess_msg').slideDown(1000);
                                $('#addClientwait_msg').slideUp(1000);
                                setTimeout(function() {
                                    window.location.href = baseURL + 'Payments';
                                }, 4000);
                            } else if(result==1) {
                                window.scrollTo(0, 0);
                                $('#addClienterror_content').html("The name has already been taken.");
                                $('#addClientwait_msg').slideUp(1000);
                                $('#addClienterror_msg').slideDown(1000);
                                setTimeout(function() {
                                    $('#addClienterror_msg').slideUp(1000);
                                }, 4000);

                            }
                        },
                    });
            });
            
            $("#tradefrontedstatus").change(function () {
                    var status = $(this).val();

                    if ($("#tradefrontedstatus").is(":checked")) {
                        status = "1";
                    } else {
                        status = "0";
                    }
                    var data = { status: status };
                    $.ajax({
                        url: baseURL + "taxes/updateDefaultTax",
                        type: "POST",
                        data: data,
                        success: function (result) {
                            if (result) {
                            
                                setTimeout("window.open('" + location.href + "','_self'); ", 2000);
                            }
                        },
                    });
                });
                $("#payment_date").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            format: "yyyy-mm-dd",
        });
        });
</script>
