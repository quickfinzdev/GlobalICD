<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
    <div ref="pdfContent" id="content">
        <div style="padding: 10px;">
            <div style="border: 2px solid #8e677a; padding: 3px;">
                <div style="border: 1px solid #ccc; padding: 3px 20px;  background:#8e677a;">
                    <div style="padding: 30px;background:#fff; border-radius:50px;">
                        <div style="text-align: center">
                            <v-img src="{{url('/images/logo1.png')}}" style="max-width: 140px; display:block; margin:auto;"></v-img>
                            <h1 style="color: #2d4c81; text-transform:uppercase; font-weight:bold; margin-top:10px; font-size:30px;">
                                International Certificate Desk</h1>
                            <h2 style="color: #cf1d31;   font-family: 'Jacquard 24', system-ui; font-size:40px;"> Certificate of Registration</h2>
                            <h2 style="color: #32506f;">The Quality Management System of
                            </h2>
                            <h1
                            style="color: #000; text-transform:uppercase; font-weight:bold; margin-top:20px;">
                            Budget System</h1>
                            <div
                                style="background-image: url();background-size: 78%; background-position: center; padding: 30px 0;">
                               
                                <h4 style="color: #010101; font-size:16px">{{$address}}</h4>
                                <h4 style="color: #234478;">has been assessed and complies
                                    with
                                    the requirements of</h4>
                                <h1 style="color: #234478; font-weight:bold;">ISO 9001:2015
                                </h1>
                                <h4 style="color: #234478;">For the following Scope</h4>
                                <h4 style="color: #0e0e0e;">Providing pocket friendly
                                    fitness
                                    solution to all & Promoting new fitness center of franchise mode.</h4>
                            </div>
                        </div>
                        <div style="display: flex;" class="justify-content-between">
                            <div>
                                <div style="display: flex;  font-size:17px;">
                                    <div style="color: #234479;" class="mr-2">Certificate No:</div>
                                    <div style="font-weight: bold;"> {{$certificate_no}}</div>
                                </div>
                                <div style="display: flex;  font-size:17px;">
                                    <div style="color: #234479;" class="mr-2">issue Date:</div>
                                    <div style="font-weight: bold;"> {{$issue_date}}</div>
                                </div>
                                <div style="display: flex;  font-size:17px;">
                                    <div style="color: #234479;" class="mr-2">Expiry Date:</div>
                                    <div style="font-weight: bold;"> {{$expiry_date}}</div>
                                </div>
                                <div style="display: flex;  font-size:17px;">
                                    <div style="color: #234479;" class="mr-2">1st Surveillance (on or before):</div>
                                    <div style="font-weight: bold;"> {{$f_s_date}}</div>
                                </div>
                                <div style="display: flex;  font-size:17px;">
                                    <div style="color: #234479;" class="mr-2">2nd Surveillance (on or before):</div>
                                    <div style="font-weight: bold;"> {{$s_s_date}}</div>
                                </div>
                            </div>
                            <div>
                                <v-img src="/images/iso.png" style="width: 150px;"></v-img>
                            </div>
                        </div>
                        <div style="padding: 10px 0; text-align: center" class="text-center">
                            <p style="color: #234479;" class="mb-0">This certificate is granted after
                                satisfactory
                                surveillance
                                on
                                limited sampling audit as per ISO standard and will remain valid for 3 years
                                from
                                the
                                date of issue where it is subject to maintenance of standards by the issued
                                body.
                                International Certification Desk will not remain responsible for client's
                                failure to
                                maintain documented quality system.</p>
                        </div>
                        <div style="display: flex;" class="py-1">
                            <v-img src="/images/signature.png" style="max-width: 100%;"></v-img>
                        </div>
                        <div class="text-center mt-2" style="text-align: center">
                            <p class="mb-0" style="color: #234479; ">61 Centre Street, New
                                York,
                                NY 1007, USA, www.icdesk.com,
                                usa@icdesk.com
                            </p>
                            <p style=" color: #234479; font-size:11px">This certificate is property of
                                International
                                Certification
                                Desk
                                LLC and shall be returned immediately on request.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>