<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>theme/jquery.min.js" ></script>
        
        
        
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }
        </style>
    </head>
    <body>

        <div id="container">
            <h1>Welcome</h1>

            <div id="body">

                <div class="col-md-12">
                    <form>
                        <div class="form-group">
                            <label>Nama Depan</label>
                            <input class="form-control" type="text">

                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input class="form-control" type="text">
                            </div>

                            <div class="pull-right">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-backward"></i>Reset</button>
                                <button class="btn btn-sm btn-success"> <i class="fa fa-save"></i>Save</button>

                            </div>
                    </form>

                </div>

                <div class="panel col-md-12">
                    <div id="content">
                        <table class="table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fabianto</td>
                                    <td>Wahyu</td>
                                    <td>Perum Munjul Jaya Permai</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>
        <script>

            $(document).ready(function () {

            getAllData();
alert("test");

                function getAllData() {
                    $.ajax({
                        url:'<?php echo base_url(); ?>welcome/getAllData',
                        type: 'get',
                        dataType: 'json',
                        data: {

                        },
                        success: function (data) {

                            $('#content').html(data);
                        }
                    });
                }
            });
            

        </script>
    </body>
</html>