// Прооект.cpp : Этот файл содержит функцию "main". Здесь начинается и заканчивается выполнение программы.
//

#include <iostream>
#include <httplib.h>
#include <string>


using namespace std;

string cook;
void questions() { 
    httplib::Client cli("localhost", 80);
    string test_num;
    cin >> test_num;
    auto a = test_num;
    string ans = "";
    httplib::Params id{
{ "id", a}
    };
    auto res = cli.Post("/test/fucn.php", id);
    if (res && res->status == 200) {
        
        std::cout << res->body << std::endl;
                }

    }
            
        
    


int main(void){
    setlocale(LC_ALL, "russian");
    bool flag = true;
    cout << "Здравствуйте, это система тестирования знаний ФТИ!" << endl << "Для регистрации нажмите 1 для входа в аккаунт 2"<<endl;
    do
    {
        string chose;
        cin >> chose;
        if (chose == "1") {


            // IMPORTANT: 1st parameter must be a hostname or an IP adress string.
            httplib::Client cli("localhost", 80);
            string  a, b, c;
            cout << "Введите электронный адрес";
            cin >> a;
            cout << "Введите имя пользователя";
            cin >> b;
            cout << "Введите пароль";
            cout << "Введите пароль";
            cin >> c;

            httplib::Params params{
          { "username", a },
          { "email", b },
          { "password", c }
            };
            flag = false;
            auto res = cli.Post("/test/index.php", params);

            if (res && res->status == 200) {
                std::cout << res->body << std::endl;
            }
        }
        else if (chose == "2") {
            string a, c;
            httplib::Client cli("localhost", 80);
            cout << "Введите имя пользователя" << endl;;
            cin >> a;
            cout << "Введите пароль" << endl;;
            cin >> c;
            httplib::Params params{
            { "username_log", a },
            { "password_log", c }
            };
            flag = false;
            auto res = cli.Post("/test/login.php", params);
            if (res && res->status == 200) {
                std::cout << res->body << std::endl;
                if (res->has_header("Set-Cookie")) {
                    string val = res->get_header_value("Set-Cookie");
                    cout << val << endl;
                    cook = val.substr(10, 26);

                }
            }
            httplib::Headers headers = {
                 { "Cookie", "PHPSESSID=" + cook }
            };
            
            
            cout << "Выберите тест"<<endl;
            res = cli.Get(("/test/fucn.php"), headers);
            if (res && res->status == 200) {
               
                std::cout << res->body << std::endl;
            }

            questions();
            }
            else {
                cout << "Вы ввели не вернный данные" << endl << "Попробуте еще раз";

            }
        
    } while (flag);
    system("pause");
        }




// Запуск программы: CTRL+F5 или меню "Отладка" > "Запуск без отладки"
// Отладка программы: F5 или меню "Отладка" > "Запустить отладку"

// Советы по началу работы 
//   1. В окне обозревателя решений можно добавлять файлы и управлять ими.
//   2. В окне Team Explorer можно подключиться к системе управления версиями.
//   3. В окне "Выходные данные" можно просматривать выходные данные сборки и другие сообщения.
//   4. В окне "Список ошибок" можно просматривать ошибки.
//   5. Последовательно выберите пункты меню "Проект" > "Добавить новый элемент", чтобы создать файлы кода, или "Проект" > "Добавить существующий элемент", чтобы добавить в проект существующие файлы кода.
//   6. Чтобы снова открыть этот проект позже, выберите пункты меню "Файл" > "Открыть" > "Проект" и выберите SLN-файл.
