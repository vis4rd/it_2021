function sendRequest(answers)
{
    const xhr = new XMLHttpRequest();
    var err_el = document.getElementById("error_info");
    var url = "../../cgi-bin/lab7/lab7.py";
    var data = encodeURI("info=" + answers);
  
    xhr.onload = () =>
    {
        if(xhr.status == 200)
        {
            var response = xhr.response;
            console.log("response content: '" + response + "'");
            console.log(xhr.getAllResponseHeaders() + "<br/>");

            var ans_data = parseReponse(response);

            drawCharts(ans_data);
        }
    };
    
    xhr.progress = () =>
    {
        console.log("Progress: " + xhr.readyState + " (progress) <br/>");
    };

    xhr.error = () =>
    {
        console.log("Unable to establish connection: status " + xhr.status + " received.");
    };

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);
}

function readAnswers()
{
    var quiz = document.getElementById('quiz');
    if((document.querySelector('input[name="q1"]:checked') != null)
    && (document.querySelector('input[name="q2"]:checked') != null)
    && (document.querySelector('input[name="q3"]:checked') != null))
    {
        var q1 = document.querySelector('input[name="q1"]:checked').value;
        var q2 = document.querySelector('input[name="q2"]:checked').value;
        var q3 = document.querySelector('input[name="q3"]:checked').value;
        console.log("Acquired answers: " + q1 + ' ' + q2 + ' ' + q3);
        sendRequest(q1 + " " + q2 + " " + q3);
    }
    else
    {
        document.getElementById('error_info').innerHTML = "Didn't select answers to all questions!";
        return false;
    }
}

function parseReponse(resp)
{
    var result = [[0, 0, 0, 0, 0, 0],
                  [0, 0, 0, 0, 0, 0],
                  [0, 0, 0, 0, 0]];
    // parse response
    var rows = resp.split('\n');  // questions
    for(var i=0; i < rows.length-1; i+=1)
    {
        var answers = rows[i].split(' ');
        for(var j=0; j < answers.length; j+=1)
        {
            result[i][j] = +answers[j];
        }
    }
    return result;
}

function drawCharts(results)
{
    var chart_width = 400;
    var chart_height = 400;
    var chart_padding = 5;

    var canvas = document.getElementById("canv");
    var canvas2 = document.getElementById("canv2");
    var canvas3 = document.getElementById("canv3");

    var targets = [canvas, canvas2, canvas3];
    
    for(var r in results)
        drawOneChart(results[r],
            chart_width,
            chart_height,
            chart_padding,
            targets[r]);
}

function drawOneChart(data, x, y, padding, canvas)
{
    canvas.width = x - padding * 2;
    canvas.height = y;

    var max_v = 0;
    for(var i in data)
    {
        max_v = Math.max(max_v, data[i]);
    }

    var bar_count = data.length;
    var bar_width  = (canvas.width - ((bar_count-1)*padding)) / bar_count;
    for(var bar_index in data)
    {
        var context = canvas.getContext("2d");
        var bar_height = Math.round(canvas.height * data[bar_index] / max_v);
        context.save();
        context.fillStyle = "#FFFFFF";
        context.fillRect(
            bar_index * (padding + bar_width),
            canvas.height - bar_height,
            bar_width,
            bar_height
        );
        context.font = "20px Monospace";
        context.fillStyle = "#A5E6E6";
        context.fillText(
            ["a)", "b)", "c)", "d)", "e)", "f)"][bar_index],
            bar_index * (padding + bar_width) + (bar_width / 2) - 8,
            canvas.height/1.5
        );
    }
    console.log("Chart should appear now.");
}