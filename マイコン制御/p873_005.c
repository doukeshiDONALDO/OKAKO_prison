//	<< p873_005.c >>		2012/02 Y.Takada
//	�_���E�V�t�g����l�q��PORT_B�ɕ\��
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	int a,i;
	set_tris_b(0x00);					//	PORT_B		output	LED
	output_b(0x00);
	
	a = 0x80;						//	0x80 -> a
	for(i=0;i<8;i++)	{					
		output_b(a);					//	a -> PORT_B	
		delay_ms(300);					//	300ms�҂�
		a >>= 1;					//	a��1bit���E�_���V�t�g
	}
}