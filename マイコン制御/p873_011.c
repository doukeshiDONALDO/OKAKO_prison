//	<< p873_011.c >>		2012/02 Y.Takada
//	sw�������ꂽ��LED��10��_�ł�����
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	int a0,i;
	set_tris_a(0x1f);
	set_tris_b(0x00);					
	output_b(0x00);
	
	a0 = 1;
	while( a0 != 0 )	{				// sw���������܂ŌJ��Ԃ�	
		a0 = input_a() & 0x01;				// PORT_A��0x01��AND�}�X�N����a0�֑��
	}
	for(i=0;i<10;i++)	{
		output_b(0xff);
		delay_ms(800);
		output_b(0x00);
		delay_ms(800);
	}
}	