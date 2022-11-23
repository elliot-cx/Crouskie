package crouskiebackoffice;

import com.google.gson.Gson;
import crouskiebackoffice.model.DataProduct;
import crouskiebackoffice.model.Product;
import crouskiebackoffice.model.dao.DAOProduct;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URI;
import java.net.URISyntaxException;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.net.http.HttpRequest;
import java.net.http.*;
import java.sql.SQLException;
import java.util.HashMap;

public class CrouskieBackOffice {

    public static String payload = "{\"action\":\"upload\","
            + "\"image\": "
            + "\"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\""
            + "}";

    public static HashMap<String, String> jj = new HashMap<>();

    public static void main(String[] args) throws MalformedURLException, ProtocolException, IOException, URISyntaxException, InterruptedException, SQLException {
        

        for (Product p : DataProduct.getInstance().getData()) {
            System.out.println(p.toString());
        }

//        jj.put("action", "upload");
//        jj.put("image", "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");
//        Gson gson = new Gson();
//
//        URI uri = new URI("http://51.75.125.2/api.php");
//        HttpRequest post = HttpRequest.newBuilder().uri(uri)
//                .POST(HttpRequest.BodyPublishers.ofString(gson.toJson(jj))).header("Content-Type", "application/json").build();
//
//        HttpClient cl = HttpClient.newHttpClient();
//
//        var res = cl.send(post, HttpResponse.BodyHandlers.discarding());
//
//        System.out.println(res.body());
//        HttpRequest request = HttpRequest.newBuilder()
//                .uri(URI.create("https://alpha-vantage.p.rapidapi.com/query?symbol=MSFT&function=TIME_SERIES_INTRADAY&interval=5min&output_size=compact&datatype=json"))
//                .header("X-RapidAPI-Key", "SIGN-UP-FOR-KEY")
//                .header("X-RapidAPI-Host", "alpha-vantage.p.rapidapi.com")
//                .method("GET", HttpRequest.BodyPublishers.noBody())
//                .build();
//        HttpResponse<String> response = HttpClient.newHttpClient().send(request, HttpResponse.BodyHandlers.ofString());
//        System.out.println(response.body());
    }

    public static void sendRequest(String apiurl, InputStream obj) {
        try {
            URL url = new URL(apiurl);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setRequestMethod("POST");
            connection.setDoOutput(true);
            connection.setRequestProperty("Content-Type", "application/json");
            connection.setRequestProperty("Accept", "application/json");
            //            connection.setRequestProperty("Authorization", "Basic " + Base64.getEncoder().encodeToString(obj.readAllBytes()));
            //            byte[] imageBytes = IOUtils.toByteArray(new URL("...")));
            //            String base64 = Base64.getEncoder().encodeToString(imageBytes);

            ;// This should be your json body i.e. {"Name" : "Mohsin"} 
            byte[] out = payload.getBytes(StandardCharsets.UTF_8);
            OutputStream stream = connection.getOutputStream();
            stream.write(out);
            System.out.println(connection.getResponseCode() + " " + connection.getResponseMessage()); // THis is optional
            connection.disconnect();
        } catch (Exception e) {
            System.out.println(e);
            System.out.println("Failed successfully");
        }
    }

}
