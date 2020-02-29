let http = require('http');
let fs = require('fs');
let fileName = 'aboutMe.json';

console.log('This is after the read call');

function onRequest(req, res) {
    console.log('Received a request for: ' + req.url);

    if (req.url === '/home') {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.write(`
                    <html>
                        <head>
                            <title>Hello World!</title>
                        </head>
                        <body>
                            <h1>Welcome to the Home Page</h1>
                            <div id="demo"></div>
                        </body>
                    </html>
                `);
        res.end();
    }
    else if (req.url === '/getData') {
        let jsonData = `{
                            "firstName":"David",
                            "lastName":"Headrick",
                            "school":"Brigham Young University - Idaho",
                            "major":"Software Engineering",
                            "course":"cs313"
                        }`;

        res.writeHead(200, { "Content-Type": "application/json" });

        fs.appendFile('aboutMe.json', jsonData, function (err) {
            if (err) throw err;
            console.log('Saved!');
        });

        fs.readFile(fileName, (err, data) => {
            if (err) {
                return console.log(err);
            }
            let me = JSON.parse(data);
            console.log(me);
        });

        res.write(jsonData);

        res.end();
    }
    else {
        res.writeHead(404, { 'Content-Type': 'text/html' });
        res.write(`
                    <html>
                        <head>
                            <title>Page Not Found</title>
                        </head>
                        <body>
                            <h1>Page Not Found</h1>
                        </body>
                    </html>
                `);
        res.end();
    }
}

let server = http.createServer(onRequest);
server.listen(8888);

console.log('The server is now listening on port 8888...');