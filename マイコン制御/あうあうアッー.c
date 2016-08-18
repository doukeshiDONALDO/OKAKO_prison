//	<< auaua-.c >>		2012/08 M.DONALD
//	Port_A
//	Port_B
//	Port_C
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP			
#use delay(clock=20000000)
int	aa,bb,cc,dd,ee,ff,gg,aaa,bbb,ccc;
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

	set_tris_a(0x00);					//	PORT_A1 input 	
	set_tris_b(0x00);					//	PORT_B1 input	
	set_tris_c(0x00);					//	PORT_C1 input		

		aa = 0x00;
		bb = 0x00;
		cc = 0x00;
		dd = 0x02;
		ee = 0x02;
		ff = 0x02;

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
	if(aaa)	aa = 0x0c;
	if(bbb)	bb = 0x0c;
	if(ccc)	cc = 0x0c;
}

void sw_check2() {
	aaa = input_a() & 0x01;
	bbb = input_b() & 0x01;
	ccc = input_c() & 0x01;	
	if(aaa)	aa = 0x0e;
	if(bbb)	bb = 0x0e;
	if(ccc)	cc = 0x0e;
}