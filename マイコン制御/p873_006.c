//	<< p873_006.c >>		2012/02 Y.Takada
//	左論理シフトする様子をPORT_Bに表示
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	int a,i;
	set_tris_b(0x00);					
	output_b(0x00);
	
	a = 0x01;
	for(i=0;i<8;i++)	{					
		output_b(a);						
		delay_ms(300);					
		a <<= 1;					//	aを1bit左シフト
	}
}