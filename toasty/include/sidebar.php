<?php
include_once("../system/main.php");

use jesuzweq\ZFunctions;

$userInfo = ZFunctions::getUserViaSession();


?>

<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">

    <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= SITEURL ?>assets/images/ws-logo.png" alt="" height="10">
            </span>
            <span class="logo-lg">
                <img src="<?= SITEURL ?>assets/images/ws-logo.png" alt="" height="13">
            </span>
        </a>

        <a class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= SITEURL ?>assets/images/ws-logo.png" alt="" height="40">
            </span>
            <span class="logo-lg">
                <style>
                    .logo-lg:hover {
                        transition: 2000ms;
                        filter: brightness(0.5);
                        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                        -webkit-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                    }

                    .logo-lg {
                        width: 100%;
                        transition: 2000ms;
                    }
                </style>
                <img src="<?= SITEURL ?>assets/images/ws-logo.png" alt="120" height="120">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">

        <div class="container-fluid">
            <div data-simplebar>

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-sorgu"style="color: #3820f0; font-size: 18px;">WS Global</span></li>
                    <li class="nav-item">

                        <a class="nav-link menu-link" href="panel">
                            <i class="ri-home-6-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="t-panel"style="font-weight: bold; color: silver;">Ana Sayfa <span
                                    class="badge rounded-pill badge-soft-light">v2</span></span>
                        </a>
                    </li>




                     <li class="nav-item">
  <a class="nav-link menu-link" href="#sidebarSorgular" data-bs-toggle="collapse" role="button"
    aria-expanded="false" aria-controls="sidebarSorgular">
    <i class="ri-user-6-fill" style="color: #3820f0; font-size: 22px;"></i>
    <span data-key="adsoyad" style="font-weight: bold; color: silver;">Genel Sorgu</span>
  </a>
</li>

                        <div class="collapse menu-dropdown" id="sidebarSorgular">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="adsoyad" class="nav-link" data-key="t-adsoyad"> Ad Soyad Sorgu <span class="badge rounded-pill badge-soft-info">VİP</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcknsorgu" class="nav-link" data-key="t-tcknsorgu"> TCKN Sorgu<span class="badge rounded-pill badge-soft-info">VİP</span> </a>
                                </li>
                            </ul>


                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ailesorgu" class="nav-link" data-key="t-aile"> Aile Sorgu <span class="badge rounded-pill badge-soft-info">VİP</span> </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="soyagaci" class="nav-link" data-key="t-soyagaci"> Soyağacı Sorgu <span class="badge rounded-pill badge-soft-info">VİP</span> </a>
                                </li>

                                
                            

                        </div>


                    </li>
                    <li class="nav-item">
  <a class="nav-link menu-link" href="#sidebarsorgupro" data-bs-toggle="collapse" role="button"
    aria-expanded="false" aria-controls="sidebarsorgupro">
    <i class="ri-user-6-fill" style="color: #3820f0; font-size: 22px;"></i>
    <span data-key="adsoyad" style="font-weight: bold; color: silver;">Detaylı Sorgu</span>
  </a>
</li>

                        <div class="collapse menu-dropdown" id="sidebarsorgupro">
                            <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                    <a href="evlilikbosanma" class="nav-link" data-key="t-evlilikbosanma"> Evlilik & Boşanma <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="medenihal" class="nav-link" data-key="t-medenihal"> Medeni Hal Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="serino" class="nav-link" data-key="t-serino"> Seri NO Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="olumtarihi" class="nav-link" data-key="t-olumtarihi"> Ölüm Sorgu<span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                   
                            </div>


</li>
                                         <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarGSM" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-phone-fill" style="color: #3820f0; font-size: 22px;"></i> <span data-key="gsmsorgu" style="font-weight: bold; color: silver;" >GSM Sorgu</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarGSM">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="gsmdentckn" class="nav-link" data-key="t-gsmdentckn"> GSM->TCKN Sorgu <span class="badge rounded-pill badge-soft-info">VİP</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tckndengsm" class="nav-link" data-key="t-tckndengsm"> TCKN->GSM Sorgu <span class="badge rounded-pill badge-soft-info">VİP</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="operator" class="nav-link" data-key="t-operator"> Operatör Sorgu <span class="badge rounded-pill badge-soft-info">VİP</span></a>
                                </li>
                            </ul>
                        </div>
						

                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebaradres" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebaradres">
                            <i class="ri-user-location-fill" style="color: #3820f0; font-size: 22px;"></i> <span data-key="sidebarardes" style="font-weight: bold; color: silver;">Adres Sorgu</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebaradres">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="adres" class="nav-link" data-key="t-sidebaradres"> Adres Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>

                        </div>

                    </li>
                                             <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarvesika" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarvesika">
                            <i class="ri-image-2-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="sidebarardes"style="font-weight: bold; color: silver;">Vesika</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarvesika">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="eokulvesika" class="nav-link" data-key="t-sidebarvesika"> -18 Vesika <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ehliyetvesika" class="nav-link" data-key="t-sidebarvesika"> +18 Vesika <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                           
                            

                        </div>

                    </li>
                                                                 <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarokul" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarokul">
                            <i class="ri-book-2-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="sidebarardes"style="font-weight: bold; color: silver;">Okul</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarokul">

                      
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="okul" class="nav-link" data-key="t-sidebarokul"> Okul NO - Durum<span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="uni" class="nav-link" data-key="t-uni"> Üniversite<span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>                            

                        </div>

                    </li>
						
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarkonut" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarkonut">
                            <i class="ri-store-3-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="sidebarkonut"style="font-weight: bold; color: silver;">Konut</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarkonut">
                       

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="vergi" class="nav-link" data-key="t-sidebarvip"> Vergi Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="isyeri" class="nav-link" data-key="t-sidebarvip">İşyeri Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="meslek" class="nav-link" data-key="t-sidebarvip">Meslek Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                           
                            
                        </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarplaka" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarplaka">
                            <i class="ri-roadster-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="sidebarplaka"style="font-weight: bold; color: silver;">Araç</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarplaka">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                    <a href="detayliplaka" class="nav-link" data-key="t-sidebarplaka"> Plaka Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>   
                            <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                    <a href="plakaceza" class="nav-link" data-key="t-plakaceza"> Plaka Ceza <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>   
                            <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                    <a href="mtvborc" class="nav-link" data-key="t-mtvborcc"> MTV Borç <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul> 
                            </div>

                            <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarsaglik" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarsaglik">
                            <i class="ri-hospital-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="sidebarsaglik"style="font-weight: bold; color: silver;">Sağlık</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarsaglik">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                    <a href="ilac" class="nav-link" data-key="t-sidebarsaglik"> İlaç <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>   
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="muayene" class="nav-link" data-key="t-sidebarsaglik"> Muayene <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="rapor" class="nav-link" data-key="t-sidebarsaglik"> Rapor <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="sigorta" class="nav-link" data-key="t-sidebarsaglik"> Sigorta <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                            

                        </div>
                        

                    </li>
						
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarvip" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarvip">
                            <i class="ri-vip-diamond-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="sidebarvip"style="font-weight: bold; color: silver;">VİP Sorgular</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarvip">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="detaylitckn" class="nav-link" data-key="t-sidebarvip"> Detaylı TCKN <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                            </ul>
                        
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tckndetayli" class="nav-link" data-key="t-sidebarvip"> Detaylı TCKN VİP <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                                
                            </ul>
                            
                            
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ayak" class="nav-link" data-key="t-sidebarvip"> Ayak Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                                
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ibansorgu" class="nav-link" data-key="t-sidebarvip"> İBAN Sorgu <span class="badge rounded-pill badge-soft-info">2023</span></a>
                                </li>
                                
                            </ul>       
                            
                        </div>

                    </li>

                    <?php if ($userInfo['userRole'] == 1 || $userInfo['userRole'] == 9 || $userInfo['userRole'] == 10) { ?>

                        <li class="nav-item">
                    <li class="menu-title"><span data-key="t-adminSidebar">Administrator</span></li>
                    <a class="nav-link menu-link" href="#sidebarAdmin" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-admin-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="t-adminSidebar"style="font-weight: bold; color: silver;">Administrator</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarAdmin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="announcement" class="nav-link" data-key="t-announcementPost"> Duyuru Paylaşımı
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="users" class="nav-link" data-key="t-Kullanıcılar"> Kullanıcılar </a>
                            </li>
                        </ul>
                    </div>
                    </li>

                    <?php } ?>
                                        <?php if($userInfo['userRole'] == 9) {?>

                        <li class="nav-item">
                    <li class="menu-title"><span data-key="t-logSidebar">LOG</span></li>
                    <a class="nav-link menu-link" href="#sidebarlog" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-admin-fill"style="color: #3820f0; font-size: 22px;"></i> <span data-key="t-logSidebar"style="font-weight: bold; color: silver;">LOG</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarlog">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="loglar" class="nav-link" data-key="t-loglar"> Görüntüle </a>
                            </li>
                        </ul>
  
                    </div>
                    </li>

                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>