// Задание 16.cpp : Этот файл содержит функцию "main". Здесь начинается и заканчивается выполнение программы.
//
//#include <iostream>
//#include <vector>
//
//using namespace std;
//#include <iostream>
//#include <vector>
//using namespace std;
//void factorization(int n) {
//	vector <int> prost;
//	int temp;
//
//	for (int i = 2; i < n;) {
//		if (n % i == 0) {
//			prost.push_back(i);
//			n = n / i;
//		}
//		else {
//			i++;
//		}
//	}
//	if (n > 1) {
//		prost.push_back(n);
//	}
//
//
//	for (int i = 0; i < prost.size(); i++) {
//		cout << prost[i];
//		temp = count(prost.begin(), prost.end(), prost[i]);
//		if (temp != 1) {
//			cout << "^" << temp;
//			i += temp - 1;
//			if (i != prost.size() - 1) cout << "*";
//			continue;
//		}
//		else if (i != prost.size() - 1) cout << "*";
//	}
//}
//int main() {
//	setlocale(LC_ALL, "Russian");
//	cout << "Введите число";
//	int n;
//	cin >> n;
//	if (n == 1) {
//		cout << "Это число ни простое, ни составное";
//		return 0;
//	}
//	else if (n <= 0)
//	{
//		cout << "Это число не натуральное";
//	}
//	else	factorization(n);
//	return 0;
//}

// Запуск программы: CTRL+F5 или меню "Отладка" > "Запуск без отладки"
// Отладка программы: F5 или меню "Отладка" > "Запустить отладку"

// Советы по началу работы 
//   1. В окне обозревателя решений можно добавлять файлы и управлять ими.
//   2. В окне Team Explorer можно подключиться к системе управления версиями.
//   3. В окне "Выходные данные" можно просматривать выходные данные сборки и другие сообщения.
//   4. В окне "Список ошибок" можно просматривать ошибки.
//   5. Последовательно выберите пункты меню "Проект" > "Добавить новый элемент", чтобы создать файлы кода, или "Проект" > "Добавить существующий элемент", чтобы добавить в проект существующие файлы кода.
//   6. Чтобы снова открыть этот проект позже, выберите пункты меню "Файл" > "Открыть" > "Проект" и выберите SLN-файл.


#include <iostream>
using namespace std;
void fact(int n) {//функция
	int temp = 2;//создал переменную
	while (n > 1) {//цикл
		int k = 0;
		while (n % temp == 0) {//( если наше число делится на temp без остатка)
			k++;
			n /= temp;//обновление переменной
		}
		if (k > 0) {
			cout << temp;
			if (k > 1) cout << "^" << k;
			if (n > 1) cout << "*";
			//cout << "*";
		}
		temp++;//увеличение переменной на 1
	//	else temp += 2;//увеличение переменной на 2
	}
}
int main()
{
	int n;
	cin >> n;
	fact(n);
	cout << endl;
}