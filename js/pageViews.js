const restPageView = postdata.vws_rest_url + `pageview/${postdata.post_id}`;

fetch(restPageView, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
})
    .then((response) => response.json())
    .then(({request: { data }}) => {
        // Do something with data.
    });
