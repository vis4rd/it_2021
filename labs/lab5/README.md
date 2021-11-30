### How to use it?

The `lab5.xml` file is a database, which is formatted by `lab5.xsl`. Using XSL Translation any modern web browser can dynamically change XML file into HTML.  

This time though, the content of the site is not static, which means that running `lab5.xml` file from web browser will not work properly.  

Here comes a python scipt, which is located in `cgi-bin/lab5.cgi`. It reads both XML and XSL files, translates them into HTML and can perform additional changes to the structure of the site. In this example the script changes the `QUERY_STRING` environment variable, so that XSL can parse it and consequently sort the contents of `lab5.xml`.  
  
To run a python script through web browser, you will need a python server. For testing purposes, you can run it on localhost using this command:
```bash
it_2021/lab5$ python3 -m http.server --bin localhost --cgi 8000
```
Now to access the CGI script, go to `http://localhost:8000/cgi-bin/lab5.cgi`.  
Otherwise (without the python server) the scipt **will NOT be executed** by the web browser.