//	<< p873_002.c >>		2012/02 Y.Takada
//	Port_B�ɐڑ�����Ă���LED��0.3�b�Ԋu�őS�ē_��
//
#include <j:\ccs-c\devices\16f873a.h>
#Fuses HS,NOWDT,NOPROTECT,NOLVP
#use delay(clock=20000000)
void main(void)
{
	set_tris_b(0x00);					
	output_b(0x00);
	
	while(1)	{					
		output_b(0x00);					//	�~�~�~�~�~�~�~�~
		delay_ms(300);					//	500ms�҂�
		output_b(0xff);					//	�~���~���~���~��
		delay_ms(300);					//	500ms�҂�
	}
}