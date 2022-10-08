<?php

    session_start();
    
    @include 'helper.php';
    @include 'database.php';
    @include 'configuration.php';
    @include dir_project().'resource/config.php';
    @include dir_project().'app/global/GlobalVariable.php';
    @include dir_project().'app/config-project.php';

    /* for Api's & Web */

    /*Api*/
    @include dir_project().'app/core/api.php';
    @include dir_project().'routes/api.php';

    /*Web*/
    @include dir_project().'app/core/web.php';
    @include dir_project().'routes/web.php';

    /* end Api's & Web*/
    
    /*include jika ada helper baru*/

    @include dir_project().'app/config.php';

    if (!empty($helperName)) {
        @include @$helperName;
    }
    
    /*end*/

    if (@route_params()) {        
        
        if ( urlHas('backend') && !urlHas('list-view/backend') ) {

            if ($auth == true) {

                //cek jika sudah login tidak bisa login lagi

                    if (auth()->id()) {

                        if (urlHas('login') || urlHas('register')) {


                            if (file_exists(dir_project().'resource/views/backend/Auth/login.php') || file_exists(dir_project().'resource/views/backend/Auth/register.php')) {
                            
            
                                badGeteway();
                
                                
                            }else{
                                
                                notFound();
                                
                            }
                            

                        }   

                    }

                // end cek


                if (empty(auth()->id())) {

                    if (!file_exists(dir_project().'resource/views/backend/Auth/login.php') && !file_exists(dir_project().'resource/views/backend/Auth/register.php')) {
                    
    
                        notFound();
        
                        
                    }

                    if (urlHas('register')) {

                        @include dir_project().'resource/views/backend/Auth/register.php';
                        die();

                    }
                    
                    @include dir_project().'resource/views/backend/Auth/login.php';

                    die();

                }

            }

            if ($auth == false) {
                
                if (urlHas('login') || urlHas('register') ) {


                    if (file_exists(dir_project().'resource/views/backend/Auth/login.php') || file_exists(dir_project().'resource/views/backend/Auth/register.php')) {
                    
    
                        badGeteway();
        
                        
                    }else{
                        
                        notFound();
                        
                    }
                    

                }

            }

            syncbackend();


        }else if( urlHas('setup') ){
            
            syncsetup();

        }else{
            
            syncfrontend();

        }
        
    }else{

        if ($redirectView) {
        
            if (redirectHas('backend') && !redirectHas('list-view/backend')) {    
    
                if (file_exists('resource/views/'.$redirectView.'.php')) {
                    
                    include redirect_layouts($backendHeader);
                       include redirect_view($redirectView);
                    include redirect_layouts($backendFooter);
                    
                }else{
                    
                    redirectNotFound();
                    
                }
            }
    
            if (redirectHas('frontend')) {
    
    
                if (file_exists('resource/views/'.$redirectView.'.php')) {
                    
    
                    include redirect_layouts($frontendHeader);
                        include redirect_view($redirectView);
                    include redirect_layouts($frontendFooter);
    
                    
                }else{
                    
                    redirectNotFound();
                    
                }
            }
    
        }else{

            /* jika url kosong dan $redirectView null */
            include dir_project().'resource/views/dashboard.php';

        }
        
        
    }
    