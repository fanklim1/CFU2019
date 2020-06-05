//#include <iostream>
//#include <httplib/httplib.h>
//#include <nlohmann/json.hpp>
//
//using json = nlohmann::json;
//using namespace std;
//int main(void)
//{
//    httplib::Client cli("api.openweathermap.org", 80);
//
//    auto res = cli.Get("/data/2.5/forecast?id=693805&units=metric&APPID=930e0440e0c93828153908b31304fe90");
//  
//    json j;
//    if (res && res->status == 200) j = json::parse(res->body);
//    
//    
//    cout << j["city"].dump();;
// 
//}
//#include <iostream>
//#include <httplib/httplib.h>
//using namespace httplib;
//
//// В этой функции формируем ответ сервера на запрос
//void gen_response(const Request& req, Response& res) {
//    // Команда set_content задаёт ответ сервера и тип ответа:
//    // Hello, World! - тело ответа
//    // text/plain - тип ответа (в данном случае обычный текст)
//    res.set_content("informer_template.html", "text/html");
//}
//
//int main() {
//    Server svr;                    // Создаём сервер (пока-что не запущен)
//    svr.Get("/", gen_response);    // Вызвать функцию gen_response если кто-то обратиться к корню "сайта"
//    svr.listen("localhost", 1234); // Запускаем сервер на localhost и порту 1234
//}
//
#include <iostream>
#include <httplib/httplib.h>
#include <nlohmann/json.hpp>
#include <string>

using json = nlohmann::json;

void replace(std::string& str, const std::string from, std::string  to, int key)
{
	switch (key)
	{
	case 1: to = to.substr(1, 10); break;
	case 2: to = to.substr(1, 3); break;
	}
	int start_pos = str.find(from);
	if (start_pos == std::string::npos) return;

	str.replace(start_pos, from.length(), to);
}


void gen_response(const httplib::Request& req, httplib::Response& res)
{
	std::string HtmlCode;
	httplib::Client cli("api.openweathermap.org", 80);
	auto result = cli.Get("/data/2.5/forecast?id=693805&units=metric&APPID=930e0440e0c93828153908b31304fe90");
	json j;
	if (result && result->status == 200) j = json::parse(result->body);

	std::ifstream stream("informer_template.html");
	getline(stream, HtmlCode, '\0');
	stream.close();

	replace(HtmlCode, "{city.name}", j["city"]["name"].dump(), 1);
	

	for (int i = 0; i < 40; i += 5) 
	{

		replace(HtmlCode, "{list.dt}", j["list"][i]["dt_txt"].dump(), 1);
		replace(HtmlCode, "{list.weather.icon}", j["list"][i]["weather"][0]["icon"].dump(), 2);
		replace(HtmlCode, "{list.main.temp}", j["list"][i]["main"]["temp"].dump(), 0);

	}
	

	res.set_content(HtmlCode, "text/html");
}


int main()
{
	httplib::Server svr;
	svr.Get("/", gen_response);
	svr.listen("localhost", 3000);
}


