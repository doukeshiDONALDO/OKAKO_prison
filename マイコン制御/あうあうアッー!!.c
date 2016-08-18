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

	set_tris_a(0x01);					//	PORT_A1 input 	
	set_tris_b(0x01);					//	PORT_B1 input	
	set_tris_c(0x01);					//	PORT_C1 input		

		aa = 0x02;
		bb = 0x04;
		cc = 0x08;
		dd = 0x10;
		ee = 0x20;
		ff = 0x40;
		gg = 0x80;
		aaa = 0xff;

	while(1)	{		
	aa = input_a() & 0x01;				//	無限ループスタート
	if(aa) {output_a(aa);
	delay_ms(500);
	output_a(bb);
	delay_ms(500);
	output_a(cc);
	delay_ms(500);
	output_a(dd);
	delay_ms(500);
	output_a(ee);
	delay_ms(500);
	output_a(ff);
	delay_ms(500);
	output_a(gg);
	delay_ms(500);
	output_a(aaa);
	delay_ms(1000);
}
	if(!aa) output_b(0x00);
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