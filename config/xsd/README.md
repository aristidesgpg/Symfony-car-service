You can't run cs-fixer against these because the doc blocks are used.
See git repo: jmdigital/wsdl_dev for full implementations. 

Automate:
wsdl: https://openmate-preprod.automate-webservices.com/OpenMateGateway/ProcessEventService?wsdl
xsd: https://openmate-preprod.automate-webservices.com/OpenMateGateway/ProcessEventService?xsd=1
maker: tools\vendor\bin\xsd2php.bat convert config\xsd\automate.yml config\xsd\automate.xsd

DealerBuilt:
wsdl: https://cdx.dealerbuilt.com/0.99a/Api.svc?wsdl
xsd: 
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd0
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd1
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd2
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd3
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd4
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd5
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd6
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd7
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd8
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd9
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd10
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd11
https://cdx.dealerbuilt.com/0.99a/Api.svc?xsd=xsd12
maker: tools\vendor\bin\xsd2php.bat convert config\xsd\dealerbuilt.yml config\xsd\dealerbuilt.xsd


DealerTrack:
wsdl: https://otstaging.arkona.com/opentrack/serviceapi.asmx?WSDL
wsdl: https://otstaging.arkona.com/opentrack/partsapi.asmx?WSDL
xsd: None. Generated one from the XML result, then modified.
maker: 
tools\vendor\bin\xsd2php.bat convert config\xsd\dealertrack.yml config\xsd\dealertrack.xsd
tools\vendor\bin\xsd2php.bat convert config\xsd\dealertrack.yml config\xsd\dealertrack_parts.xsd

CDK:
Does not have a WSDL. Is not SOAP. Restfull API.
Exported xml and converted to xsd.
maker: vendor\bin\xsd2php.bat convert config\xsd\cdk.yml config\xsd\cdk.xsd