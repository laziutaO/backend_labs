const express = require("express")
const hbs = require("hbs")
const axios = require('axios')

let app = express();
app.set('view engine', 'hbs')
app.get('/', (req, res) => {
    res.send("Hello express")
});


app.get('/weather', (req, res) => {
    res.render('weather', { city: null });

});

app.get('/weather/:city', async (req, res) => {
    const city = req.params.city;
    const apiKey = '763e6b0da489e9b0f019a797c776e341';
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=imperial&appid=${apiKey}`;

    try {
        const response = await axios.get(url);
        const weather = response.data;
        res.render('city_weather', { city: city, weather: weather });
    } catch (error) {
        console.error('Error fetching weather data:', error);
        res.render('city_weather', { city: city, weather: null }); // Render with null weather data
    }
});



app.listen(3000, ()=> {
    console.log("Example app listening on port 3000");
});