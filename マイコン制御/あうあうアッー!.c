//	<< auaua-.c >>		2012/08 M.DONALD
//	Port_A
//	Port_B
//	Port_C
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP			
#use delay(clock=20000000)
char	aa,bb,cc,dd,ee,ff,gg,aaa,bbb,ccc;
void sw_check(void);
void sw_check2(void);
void main(void)
{
	
//	0x02; 
//	0x04;
//	0x06;
//	0x08;
//	0x0a;
//	0x0c;
//	0x0e;

	set_tris_a(0x01);					//	PORT_A1 input 	
	set_tris_b(0x01);					//	PORT_B1 input	
	set_tris_c(0x01);					//	PORT_C1 input		

		aa = 0x0e;
		bb = 0x0e;
		cc = 0x0e;
		dd = 0x0c;
		ee = 0x0c;
		ff = 0x0c;

	while(1)	{						//	無限ループスタート
		output_a(aa);
		output_b(bb);
		output_c(cc);
		sw_check();
		delay_ms(500);	
		output_a(dd);
		output_b(ee);
		output_c(ff);
		sw_check2();
		delay_ms(500);
	}
}

void sw_check() {
	aaa = input_a() & 0x01;
	bbb = input_b() & 0x01;
	ccc = input_c() & 0x01;	
	if(aaa)	aa = 0x02;
	if(bbb)	bb = 0x02;
	if(ccc)	cc = 0x02;
}

void sw_check2() {
	aaa = input_a() & 0x01;
	bbb = input_b() & 0x01;
	ccc = input_c() & 0x01;	
	if(aaa)	aa = 0x00;
	if(bbb)	bb = 0x00;
	if(ccc)	cc = 0x00;
}